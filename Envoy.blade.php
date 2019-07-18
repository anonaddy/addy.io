@setup
require __DIR__."/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::create(__DIR__, ".env");
$dotenv->load();

$userAndServer = getenv("ENVOY_USER_AND_SERVER");
$repository = "anonaddy/anonaddy.com";
$baseDir = getenv("ENVOY_BASE_DIR");
$releasesDir = "{$baseDir}/releases";
$currentDir = "{$baseDir}/current";
$newReleaseName = date("Ymd-His");
$newReleaseDir = "{$releasesDir}/{$newReleaseName}";

function logMessage($message) {
  return "echo '\033[32m" .$message. "\033[0m';\n";
}
@endsetup

@servers(["local" => "127.0.0.1", "remote" => $userAndServer])

@story("deploy")
startDeployment
cloneRepository
runComposer
runNpm
generateAssets
cleanOldReleases
finishDeploy
@endstory

@story("deploy-rollback")
deploymentRollback
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

@task("runComposer", ["on" => "remote"])
{{ logMessage("🚚  Running Composer...") }}
cd {{ $newReleaseDir }}
composer install --prefer-dist --no-scripts --no-dev -q -o
@endtask

@task("runNpm", ["on" => "remote"])
{{ logMessage("📦  Running Npm...") }}
cd {{ $newReleaseDir }}
npm install --no-progress &> /dev/null
@endtask

@task("generateAssets", ["on" => "remote"])
{{ logMessage("🌅  Generating assets...") }}
cd {{ $newReleaseDir }}
npm run production --no-progress &> /dev/null

# Mark release
cd {{ $newReleaseDir }}
echo "{{ $newReleaseName }}" > build_production/release-name.txt

ln -nfs {{ $newReleaseDir }} {{ $currentDir }}
@endtask

@task("cleanOldReleases", ["on" => "remote"])
{{ logMessage("🚾  Cleaning up old releases...") }}
# Delete all but the 5 most recent.
cd {{ $releasesDir }}
ls -dt {{ $releasesDir }}/* | tail -n +6 | xargs -d "\n" chown -R deployer .
ls -dt {{ $releasesDir }}/* | tail -n +6 | xargs -d "\n" rm -rf
@endtask

@task("finishDeploy", ["on" => "local"])
{{ logMessage("🚀  Application deployed!") }}
@endtask

@task("deploymentRollback")
cd {{ $releasesDir }}
ln -nfs {{ $releasesDir }}/$(find . -maxdepth 1 -name "20*" | sort  | tail -n 2 | head -n1) {{ $baseDir }}/current
echo "Rolled back to $(find . -maxdepth 1 -name "20*" | sort  | tail -n 2 | head -n1)"
@endtask
