// Hashes the app's tracker domain list for the email tracker checker, so the page can test a host against it
// without publishing the list itself. Also hashes the hosts in tracking_services.php, so the page can say who
// runs a tracker without naming the host.
//
// Usage: ADDY_APP_PATH=/path/to/app npm run sync:trackers

import { createHash } from 'node:crypto'
import { readFileSync, writeFileSync } from 'node:fs'
import { resolve } from 'node:path'

// Must match TRACKER_SALT in source/_assets/js/tracker-rules.js
const SALT = 'addy.io/tracker-checker:'

if (!process.env.ADDY_APP_PATH) {
  console.error('Set ADDY_APP_PATH to the path of the addy.io app')
  process.exit(1)
}

const appPath = resolve(process.env.ADDY_APP_PATH)
const source = readFileSync(resolve(appPath, 'config/lists/tracking_domains.php'), 'utf8')

const domains = [...new Set([...source.matchAll(/^\s*'([^']+)',/gm)].map((m) => m[1].toLowerCase().replace(/^\.+/, '')).filter(Boolean))]

if (domains.length === 0) {
  console.error('No domains found in tracking_domains.php')
  process.exit(1)
}

const hash = (domain) => createHash('sha256').update(SALT + domain).digest('hex').slice(0, 16)
const hashes = domains.map(hash).sort()

// 'host' => 'Company' pairs. Sorted by hash so the order gives nothing away
const servicesSource = readFileSync(resolve(appPath, 'config/lists/tracking_services.php'), 'utf8')
const services = Object.fromEntries(
  [...servicesSource.matchAll(/^\s*'([^']+)'\s*=>\s*'((?:[^'\\]|\\.)*)',/gm)]
    .map((m) => [hash(m[1].toLowerCase().replace(/^\.+/, '')), m[2].replace(/\\'/g, "'")])
    .sort(([a], [b]) => a.localeCompare(b)),
)

const out = resolve('source/_assets/js/data/tracker-hashes.json')
writeFileSync(out, JSON.stringify({ count: hashes.length, hashes, services }) + '\n')

console.log(`Wrote ${hashes.length} tracker hashes and ${Object.keys(services).length} service names to ${out}`)
