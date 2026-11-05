@setup
require __DIR__."/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$userAndServer = explode(',', $_ENV["ENVOY_USER_AND_SERVER"]);
$repository = "anonaddy/addy.io";
$baseDir = $_ENV["ENVOY_BASE_DIR"];
$releasesDir = "{$baseDir}/releases";
$currentDir = "{$baseDir}/current";
$newReleaseName = date("Ymd-His");
$newReleaseDir = "{$releasesDir}/{$newReleaseName}";

$stagingUserAndServer = explode(',', $_ENV["ENVOY_STAGING_USER_AND_SERVER"]);
$stagingBaseDir = $_ENV["ENVOY_STAGING_BASE_DIR"];
$stagingReleasesDir = "{$stagingBaseDir}/releases";
$stagingCurrentDir = "{$stagingBaseDir}/current";
$stagingNewReleaseDir = "{$stagingReleasesDir}/{$newReleaseName}";
$localProjectDir = __DIR__;

// Non-interactive SSH does not source ~/.bashrc
// Prefer ENVOY_NODE_BIN_PREPEND (absolute path to the bin directory that contains node and npm).
$nodeVersion = $_ENV['ENVOY_NODE_VERSION'] ?? '';
$nodeBinPrepend = $_ENV['ENVOY_NODE_BIN_PREPEND'] ?? null;
if ($nodeBinPrepend !== null && trim($nodeBinPrepend) !== '') {
    $remoteNodeInit = 'export PATH=' . escapeshellarg(rtrim($nodeBinPrepend, '/')) . ':$PATH' . "\n";
} else {
    $nvmDir = $_ENV['ENVOY_NVM_DIR'] ?? '';
    if ($nvmDir !== '') {
        $remoteNodeInit =
            'export NVM_DIR=' . escapeshellarg($nvmDir) . "\n" .
            '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"' . "\n" .
            'nvm use ' . escapeshellarg($nodeVersion) . "\n";
    } else {
        // Explicit newlines
        $remoteNodeInit =
            'export NVM_DIR="$HOME/.nvm"' . "\n" .
            '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"' . "\n" .
            'nvm use ' . escapeshellarg($nodeVersion) . "\n";
    }
}

function logMessage($message) {
  return "echo '\033[32m" .$message. "\033[0m';\n";
}
@endsetup

@servers(["local" => "127.0.0.1", "remote" => $userAndServer, "staging" => $stagingUserAndServer])

@story("deploy")
startDeployment
cloneRepository
runComposer
runNpm
mergeHelpArticles
generateAssets
cleanOldReleases
finishDeploy
@endstory

@story("deploy-rollback")
deploymentRollback
@endstory

@story("deploy-staged-to-staging")
startDeployment
prepareReleaseToStaging
rsyncLocalChangesToStaging
runComposerOnStaging
runNpmOnStaging
mergeHelpArticlesOnStaging
generateAssetsOnStaging
cleanOldReleasesOnStaging
finishDeploy
@endstory

@task("startDeployment", ["on" => "local"])
{{ logMessage("🏃  Starting deployment...") }}
@endtask

@task("cloneRepository", ["on" => "remote"])
{{ logMessage("🌀  Cloning repository...") }}
[ -d {{ $releasesDir }} ] || mkdir {{ $releasesDir }}
cd {{ $releasesDir }}

# Create the release dir
mkdir {{ $newReleaseDir }}

# Clone the repo
git clone --depth 1 git@github.com:{{ $repository }} {{ $newReleaseName }}

# Configure sparse checkout
cd {{ $newReleaseDir }}
git config core.sparsecheckout true
echo "*" > .git/info/sparse-checkout
echo "!storage" >> .git/info/sparse-checkout
echo "!public/build" >> .git/info/sparse-checkout
git read-tree -mu HEAD
@endtask

@task("prepareReleaseToStaging", ["on" => "staging"])
{{ logMessage("📁  Preparing new release directory...") }}
[ -d {{ $stagingReleasesDir }} ] || mkdir -p {{ $stagingReleasesDir }}
mkdir {{ $stagingNewReleaseDir }}

@if (isset($staged_only) && $staged_only)
if [ -d {{ $stagingCurrentDir }} ]; then
    cp -a {{ $stagingCurrentDir }}/. {{ $stagingNewReleaseDir }}/
fi
@endif
@endtask

@task("rsyncLocalChangesToStaging", ["on" => "local"])
{{ logMessage("📤  Syncing local changes to staging...") }}
cd {{ $localProjectDir }}

@if (isset($staged_only) && $staged_only)
STAGED_FILES=$(git diff --cached --name-only --diff-filter=ACMR)
if [ -z "$STAGED_FILES" ]; then
    echo "No staged files to deploy. Stage changes with git add first."
    exit 1
fi
@foreach ($stagingUserAndServer as $server)
echo "$STAGED_FILES" | rsync -avz -e ssh --files-from=- --relative ./ {{ trim($server) }}:{{ $stagingNewReleaseDir }}/
@endforeach
@else
@foreach ($stagingUserAndServer as $server)
rsync -avz --delete -e ssh \
    --exclude '.git/' \
    --exclude 'node_modules/' \
    --exclude '/vendor/' \
    --exclude '.env' \
    --exclude 'build_local/' \
    --exclude 'build_staging/' \
    --exclude 'build_production/' \
    --exclude 'build_development/' \
    --exclude 'cache/' \
    --exclude 'merged_help_articles/' \
    --exclude 'source/assets/build/' \
    --exclude 'storage/' \
    --exclude 'public/build/' \
    ./ {{ trim($server) }}:{{ $stagingNewReleaseDir }}/
@endforeach
@endif
@endtask

@task("runComposer", ["on" => "remote"])
{{ logMessage("🚚  Running Composer...") }}
cd {{ $newReleaseDir }}
composer install --prefer-dist --no-scripts --no-dev -q -o
@endtask

@task("runNpm", ["on" => "remote"])
{{ logMessage("📦  Running Npm...") }}
{{ $remoteNodeInit }}
cd {{ $newReleaseDir }}
npm install --no-progress &> /dev/null
@endtask

@task("mergeHelpArticles", ["on" => "remote"])
{{ logMessage("📚  Merging help articles by category...") }}
cd {{ $newReleaseDir }}
bash scripts/merge-help-articles.sh
@endtask

@task("generateAssets", ["on" => "remote"])
{{ logMessage("🌅  Generating assets...") }}
{{ $remoteNodeInit }}
cd {{ $newReleaseDir }}
npm run prod --no-progress &> /dev/null

# Mark release
cd {{ $newReleaseDir }}
echo "{{ $newReleaseName }}" > build_production/release-name.txt

ln -nfs {{ $newReleaseDir }} {{ $currentDir }}
@endtask

@task("cleanOldReleases", ["on" => "remote"])
{{ logMessage("🚾  Cleaning up old releases...") }}
# Delete all but the 3 most recent.
cd {{ $releasesDir }}
ls -dt {{ $releasesDir }}/* | tail -n +4 | xargs -d "\n" chown -R deployer .
ls -dt {{ $releasesDir }}/* | tail -n +4 | xargs -d "\n" rm -rf
@endtask

@task("runComposerOnStaging", ["on" => "staging"])
{{ logMessage("🚚  Running Composer...") }}
cd {{ $stagingNewReleaseDir }}
composer install --prefer-dist --no-scripts --no-dev -q -o
@endtask

@task("runNpmOnStaging", ["on" => "staging"])
{{ logMessage("📦  Running Npm...") }}
{{ $remoteNodeInit }}
cd {{ $stagingNewReleaseDir }}
npm install --no-progress &> /dev/null
@endtask

@task("mergeHelpArticlesOnStaging", ["on" => "staging"])
{{ logMessage("📚  Merging help articles by category...") }}
cd {{ $stagingNewReleaseDir }}
bash scripts/merge-help-articles.sh
@endtask

@task("generateAssetsOnStaging", ["on" => "staging"])
{{ logMessage("🌅  Generating assets...") }}
{{ $remoteNodeInit }}
cd {{ $stagingNewReleaseDir }}
npm run prod --no-progress &> /dev/null

# Mark release
cd {{ $stagingNewReleaseDir }}
echo "{{ $newReleaseName }}" > build_production/release-name.txt

ln -nfs {{ $stagingNewReleaseDir }} {{ $stagingCurrentDir }}
@endtask

@task("cleanOldReleasesOnStaging", ["on" => "staging"])
{{ logMessage("🚾  Cleaning up old releases...") }}
# Delete all but the 3 most recent.
cd {{ $stagingReleasesDir }}
ls -dt {{ $stagingReleasesDir }}/* | tail -n +4 | xargs -d "\n" chown -R deployer .
ls -dt {{ $stagingReleasesDir }}/* | tail -n +4 | xargs -d "\n" rm -rf
@endtask

@task("finishDeploy", ["on" => "local"])
{{ logMessage("🚀  Application deployed!") }}
@endtask

@task("deploymentRollback")
cd {{ $releasesDir }}
ln -nfs {{ $releasesDir }}/$(find . -maxdepth 1 -name "20*" | sort  | tail -n 2 | head -n1) {{ $baseDir }}/current
echo "Rolled back to $(find . -maxdepth 1 -name "20*" | sort  | tail -n 2 | head -n1)"
@endtask
