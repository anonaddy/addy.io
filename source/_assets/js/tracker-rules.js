// The same checks as the app's TrackingPixelStripper, so the checker finds what addy.io would remove.
// Keep the two in step: each function here matches the PHP method of the same name.

import trackerHashes from './data/tracker-hashes.json'

// Must match SALT in scripts/sync-tracking-domains.mjs
const TRACKER_SALT = 'addy.io/tracker-checker:'
const HASHES = new Set(trackerHashes.hashes)
const SERVICES = new Map(Object.entries(trackerHashes.services ?? {}))

const ENTITIES = { amp: '&', quot: '"', apos: "'", lt: '<', gt: '>', nbsp: ' ' }

const decodeEntities = (value) =>
  value.replace(/&(#x[0-9a-f]+|#\d+|[a-z]+);/gi, (match, ref) => {
    if (ref[0] === '#') {
      const code =
        ref[1].toLowerCase() === 'x' ? parseInt(ref.slice(2), 16) : parseInt(ref.slice(1), 10)
      return Number.isFinite(code) ? String.fromCodePoint(code) : match
    }
    return ENTITIES[ref.toLowerCase()] ?? match
  })

// Like PHP's parse_url, for the host and path only
const parseUrl = (src) => {
  const m = src.match(/^(?:([a-z][a-z0-9+.-]*):)?(?:\/\/([^/?#]*))?([^?#]*)/i)
  if (!m) return { host: null, path: null }
  const authority = m[2] ?? null
  const host =
    authority === null
      ? null
      : authority
          .replace(/^.*@/, '')
          .replace(/:\d*$/, '')
          .replace(/^\[|\]$/g, '')
  return { host: host || null, path: m[3] || null }
}

export const attributeValue = (tag, name) => {
  const m = tag.match(new RegExp(`\\b${name}\\s*=\\s*(?:"([^"]*)"|'([^']*)'|([^\\s>]+))`, 'i'))
  if (!m) return null
  const value = m[1] ?? m[2] ?? m[3]
  return value === undefined ? null : decodeEntities(value)
}

const hashOf = async (domain) => {
  const bytes = new TextEncoder().encode(TRACKER_SALT + domain)
  const digest = new Uint8Array(await crypto.subtle.digest('SHA-256', bytes))
  return [...digest.slice(0, 8)].map((b) => b.toString(16).padStart(2, '0')).join('')
}

// The host or any parent domain is on the list, e.g. a.track.example matches track.example
const matchesTrackingDomain = async (src) => {
  src = src.trim()
  if (src === '' || /^(cid:|data:)/i.test(src) || !/^https?:\/\//i.test(src)) return false

  const { host } = parseUrl(src)
  if (!host) return false

  const key = host.toLowerCase()
  if (!hostResults.has(key)) hostResults.set(key, isListedHost(key))
  return hostResults.get(key)
}

// Who runs a tracking host, matched on the host or a parent domain, as with the tracker list
export const serviceFor = async (host) => {
  if (!host || !/^[a-z0-9.-]+$/i.test(host)) return null
  const labels = host.toLowerCase().split('.')
  for (let i = 0; i < labels.length; i++) {
    const name = SERVICES.get(await hashOf(labels.slice(i).join('.')))
    if (name) return name
  }
  return null
}

// Each host is only hashed once, however many images use it
const hostResults = new Map()

const isListedHost = async (host) => {
  const labels = host.split('.')
  for (let i = 0; i < labels.length; i++) {
    if (HASHES.has(await hashOf(labels.slice(i).join('.')))) return true
  }
  return false
}

const hostLooksLikeTracker = (src) => {
  let { host } = parseUrl(src)
  if (!host) return false
  host = host.toLowerCase()
  return host.includes('mailtrack') || host.startsWith('pixel.') || host.includes('.pixel.')
}

const urlLooksLikeOpenTracker = (src) => {
  let { path } = parseUrl(src)
  if (!path) return false
  path = path.toLowerCase()

  if (/\/(open|track|pixel|beacon|report-email)(\/|\.|$)/.test(path)) return true
  if (/(?:^|[/._-])open$/.test(path)) return true
  return /\/(?:t|r)\/[a-z0-9]{12,}/.test(path)
}

const pathLooksLikeProductAsset = (path) => {
  const base = path.replace(/\/+$/, '').split('/').pop() ?? ''
  const dot = base.lastIndexOf('.')
  const filename = dot > 0 ? base.slice(0, dot) : base
  if (filename.length >= 12) return true
  return /\/(?:[^/]*images?|imgs?|media|photos?|uploads?|content|pcontent|members|assets)(?:\/|$)/.test(
    path
  )
}

const urlLooksLikeShortGifPixel = (src) => {
  let { path } = parseUrl(src)
  if (!path) return false
  path = path.toLowerCase()
  return path.endsWith('.gif') && !pathLooksLikeProductAsset(path)
}

const isHybridHiddenImage = (tag) => {
  const style = attributeValue(tag, 'style')
  return Boolean(style) && /(?:^|;)\s*mso-hide\s*:/i.test(style)
}

const hasPercentageDimension = (tag) => {
  for (const name of ['width', 'height']) {
    const attr = attributeValue(tag, name)
    if (attr !== null && /^\s*\d+(?:\.\d+)?\s*%\s*$/.test(attr)) return true

    const style = attributeValue(tag, 'style')
    if (
      style !== null &&
      new RegExp(`(?:^|;)\\s*${name}\\s*:\\s*\\d+(?:\\.\\d+)?\\s*%`, 'i').test(style)
    )
      return true
  }
  return false
}

const dimensionValue = (tag, name) => {
  const attr = attributeValue(tag, name)
  let m = attr !== null && attr.match(/^\s*(\d+(?:\.\d+)?)\s*(px)?\s*$/i)
  if (m) return Math.round(parseFloat(m[1]))

  const style = attributeValue(tag, 'style')
  m =
    style !== null &&
    style.match(
      new RegExp(
        `(?:^|;)\\s*${name}\\s*:\\s*(\\d+(?:\\.\\d+)?)\\s*(px)?\\s*(?:!important\\s*)?(?:;|$)`,
        'i'
      )
    )
  if (m) return Math.round(parseFloat(m[1]))

  return null
}

const isTinyPixel = (tag) => {
  if (hasPercentageDimension(tag)) return false

  const width = dimensionValue(tag, 'width')
  const height = dimensionValue(tag, 'height')
  if (width === null && height === null) return false

  return (width === null || width <= 2) && (height === null || height <= 2)
}

// Why addy.io would remove this image, or null if it would be kept
export const removalReason = async (tag) => {
  const src = attributeValue(tag, 'src')

  if (src) {
    if (await matchesTrackingDomain(src)) return 'known'
    if (hostLooksLikeTracker(src)) return 'host'
    if (urlLooksLikeOpenTracker(src)) return 'path'
  }

  if (!isTinyPixel(tag)) return null
  if (!isHybridHiddenImage(tag)) return 'tiny'
  return src && urlLooksLikeShortGifPixel(src) ? 'tiny' : null
}

export const reportLabel = (tag) => {
  const src = attributeValue(tag, 'src')
  if (!src || /^(cid:|data:)/i.test(src)) return '1x1 pixel'
  const { host } = parseUrl(src)
  return host ? host.toLowerCase() : src.slice(0, 120)
}

// Every <img> in the HTML, with the reason it would be removed (or null)
export const findImages = async (html) => {
  if (!html.toLowerCase().includes('<img')) return []
  // Matches /<img\b[^>]*>/gi as in the PHP, without a regex: once there's no ">" left, no later tag can close,
  // so a file full of unclosed tags can't make the browser backtrack for minutes
  const images = []
  const lower = html.toLowerCase()
  let at = lower.indexOf('<img')
  while (at !== -1) {
    if (/\w/.test(lower[at + 4] ?? '')) {
      at = lower.indexOf('<img', at + 4)
      continue
    }
    const end = html.indexOf('>', at)
    if (end === -1) break
    const tag = html.slice(at, end + 1)
    images.push({
      tag,
      src: attributeValue(tag, 'src'),
      reason: await removalReason(tag),
      label: reportLabel(tag),
    })
    at = lower.indexOf('<img', end + 1)
  }
  return images
}
