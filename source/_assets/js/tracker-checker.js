// Email tracker checker: finds the tracking pixels addy.io would remove from an email, all in the browser
import { findImages, serviceFor } from './tracker-rules.js'

const form = document.getElementById('checker')
const input = document.getElementById('source-text')
const fileInput = document.getElementById('source-file')
const exampleButton = document.getElementById('source-example')
const results = document.getElementById('checker-results')

const EXAMPLE = `Return-Path: <bounce@mail.shop.example>
From: "Example Shop" <news@shop.example>
To: johndoe@example.net
Subject: =?UTF-8?Q?Our_autumn_sale_starts_now_=F0=9F=8D=82?=
Date: Tue, 3 Nov 2026 17:12:01 +0000
Message-ID: <20261103171201.4f2a@mail.shop.example>
MIME-Version: 1.0
Content-Type: multipart/alternative; boundary="sale-boundary"

--sale-boundary
Content-Type: text/plain; charset=UTF-8

Our autumn sale starts now. Up to 40% off everything.

--sale-boundary
Content-Type: text/html; charset=UTF-8
Content-Transfer-Encoding: quoted-printable

<html><body>
<img src=3D"https://cdn.shop.example/images/logo.png" width=3D"160" height=3D"=
40" alt=3D"Example Shop">
<h1>Our autumn sale starts now</h1>
<img src=3D"https://cdn.shop.example/images/autumn-sale.jpg" width=3D"600" alt=
=3D"Up to 40% off">
<p>Up to 40% off everything until Sunday.</p>
<a href=3D"https://shop.example/sale">Shop the sale</a>
<img src=3D"https://email.shop.example/track/open.php?u=3D8f3c2a&amp;id=3D41=
d7e0&amp;e=3D9b2f61" height=3D"1" width=3D"1" alt=3D"">
<img src=3D"https://pixel.mailer.example/o/q7Lm2xYz.png" alt=3D"" border=3D"0">
<img src=3D"https://links.shop.example/wf/open?upn=3D4kT9wPz" alt=3D"" style=3D=
"height:1px !important;width:1px !important">
<img src=3D"https://shop.example/e/o/3f9a1c.gif" width=3D"1" height=3D"1" style=
=3D"display:none">
</body></html>

--sale-boundary--
`

const MAX_FILE_MB = 50

const REASONS = {
  known: ['Known tracker', 'This host is on the list of tracking services addy.io blocks.'],
  host: ['Tracker hostname', 'The hostname is one used for tracking, such as pixel. or mailtrack.'],
  path: [
    'Open-tracking address',
    'The address ends in something like /open or /track, which is used to record opens.',
  ],
  tiny: [
    'Tiny image',
    'The image is 2×2 pixels or smaller, too small to see. Images this size are almost always open trackers.',
  ],
}

const el = (tag, className, text) => {
  const node = document.createElement(tag)
  if (className) node.className = className
  if (text !== undefined && text !== null) node.textContent = text
  return node
}

const section = (title, intro) => {
  const card = el('div', 'card ha-card')
  card.append(el('h2', 'ha-card-title', title))
  if (intro) card.append(el('p', 'ha-card-intro', intro))
  return card
}

// MIME parsing: enough to find the HTML parts of a raw email

const splitPart = (raw) => {
  const text = raw.replace(/\r\n?/g, '\n')
  const end = text.search(/\n[ \t]*\n/)
  if (end === -1) return { headerBlock: text, body: '' }
  return { headerBlock: text.slice(0, end), body: text.slice(end).replace(/^\n[ \t]*\n/, '') }
}

const parseHeaders = (block) => {
  const headers = {}
  let last = null
  for (const line of block.split('\n')) {
    if (/^[ \t]/.test(line) && last) {
      headers[last] += ' ' + line.trim()
    } else {
      const m = line.match(/^([!-9;-~]+):[ \t]?(.*)$/)
      if (m) {
        last = m[1].toLowerCase()
        headers[last] = headers[last] === undefined ? m[2].trim() : headers[last]
      }
    }
  }
  return headers
}

const param = (value, name) =>
  value
    ?.match(new RegExp(`;\\s*${name}\\s*=\\s*(?:"([^"]*)"|([^;\\s]+))`, 'i'))
    ?.slice(1)
    .find((v) => v !== undefined) ?? null

const decodeBytes = (bytes, charset) => {
  try {
    return new TextDecoder(charset || 'utf-8').decode(bytes)
  } catch {
    return new TextDecoder('utf-8').decode(bytes)
  }
}

// Text from a file is read as Latin-1, so each character is one byte of the original
const toBytes = (text, binary) =>
  binary ? Uint8Array.from(text, (c) => c.charCodeAt(0) & 0xff) : new TextEncoder().encode(text)

const decodeBody = (body, encoding, charset, binary) => {
  encoding = (encoding ?? '').toLowerCase().trim()

  if (encoding === 'base64') {
    try {
      return decodeBytes(
        Uint8Array.from(atob(body.replace(/[^A-Za-z0-9+/=]/g, '')), (c) => c.charCodeAt(0)),
        charset
      )
    } catch {
      return ''
    }
  }

  if (encoding === 'quoted-printable') {
    const text = body.replace(/=[ \t]*\n/g, '')
    const bytes = []
    const plain = toBytes(text, binary)
    for (let i = 0; i < plain.length; i++) {
      const hex =
        plain[i] === 0x3d ? String.fromCharCode(plain[i + 1] ?? 0, plain[i + 2] ?? 0) : null
      if (hex && /^[0-9a-f]{2}$/i.test(hex)) {
        bytes.push(parseInt(hex, 16))
        i += 2
      } else {
        bytes.push(plain[i])
      }
    }
    return decodeBytes(Uint8Array.from(bytes), charset)
  }

  return binary ? decodeBytes(toBytes(body, true), charset) : body
}

const htmlParts = (raw, binary, depth = 0) => {
  const { headerBlock, body } = splitPart(raw)
  const headers = parseHeaders(headerBlock)
  const type = (headers['content-type'] ?? 'text/plain').split(';')[0].trim().toLowerCase()

  if (depth < 10 && type.startsWith('multipart/')) {
    const boundary = param(headers['content-type'], 'boundary')
    if (!boundary) return []
    const escaped = boundary.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')
    const pieces = body.split(new RegExp(`^--${escaped}(?:--)?[ \\t]*$`, 'm')).slice(1)
    return pieces.flatMap((piece) => htmlParts(piece.replace(/^\n/, ''), binary, depth + 1))
  }

  if (depth < 10 && type === 'message/rfc822') return htmlParts(body, binary, depth + 1)

  if (type === 'text/html')
    return [
      decodeBody(
        body,
        headers['content-transfer-encoding'],
        param(headers['content-type'], 'charset'),
        binary
      ),
    ]

  return []
}

// A raw email starts with headers. Anything else that contains HTML is checked as HTML
const readEmail = (raw, binary) => {
  const { headerBlock } = splitPart(raw.replace(/^\s*\n/, ''))
  const headers = parseHeaders(headerBlock)
  const looksLikeEmail = Object.keys(headers).some((h) =>
    ['from', 'received', 'content-type', 'mime-version', 'subject'].includes(h)
  )

  if (!looksLikeEmail) return { headers: {}, html: /<[a-z!]/i.test(raw) ? [raw] : [] }

  return { headers, html: htmlParts(raw.replace(/^\s*\n/, ''), binary) }
}

const check = async (raw, binary = false, truncated = false) => {
  results.replaceChildren()
  if (!raw.trim()) return

  const { headers, html } = readEmail(raw, binary)
  const forwarded = Object.keys(headers).some((h) => h.startsWith('x-anonaddy-'))
  const removedByAddy = html
    .join(' ')
    .match(/Removed(?:&nbsp;|\s)+(\d+)(?:&nbsp;|\s)+tracking(?:&nbsp;|\s)+pixels?/i)?.[1]

  if (!html.length) {
    const card = el('div', 'card ha-verdict is-neutral')
    card.append(el('p', 'ha-verdict-label', 'Tracker check'))
    card.append(el('h2', null, 'No HTML found'))
    card.append(
      el(
        'p',
        null,
        truncated
          ? `This file is over ${MAX_FILE_MB}MB, so only the first ${MAX_FILE_MB}MB was checked, and no HTML was found in it. The HTML is probably after a large attachment. Try saving the email without its attachments.`
          : Object.keys(headers).length
            ? "This email has no HTML part, only plain text. Plain-text emails can't contain tracking pixels, though links in them can still be tracked."
            : 'Paste the full source of an email, not just the text you see. It starts with lines like "From:" and "Subject:". You can also paste an email\'s HTML.'
      )
    )
    results.append(card)
    scrollToResults()
    return
  }

  const images = (await Promise.all(html.map(findImages))).flat()
  const trackers = images.filter((image) => image.reason)
  const kept = images.length - trackers.length

  // Verdict
  const card = el('div', `card ha-verdict ${trackers.length ? 'is-fail' : 'is-pass'}`)
  card.append(el('p', 'ha-verdict-label', 'Tracker check'))
  if (trackers.length) {
    card.append(
      el(
        'h2',
        null,
        `Found ${trackers.length} tracking ${trackers.length === 1 ? 'pixel' : 'pixels'}`
      )
    )
    card.append(
      el(
        'p',
        null,
        `Opening this email with images on would tell the sender you read it. addy.io would remove ${trackers.length === 1 ? 'it' : 'all of them'} before forwarding the email to you.`
      )
    )
  } else {
    card.append(el('h2', null, 'No tracking pixels found'))
    card.append(
      el(
        'p',
        null,
        images.length
          ? `None of the ${images.length} ${images.length === 1 ? 'image' : 'images'} in this email look like trackers.`
          : "This email has no images, so it can't contain a tracking pixel."
      )
    )
  }
  results.append(card)

  // Forwarded by addy.io: if blocking was on, the trackers are already gone
  if (forwarded) {
    const note = section(
      'Forwarded by addy.io',
      removedByAddy
        ? `addy.io already removed ${removedByAddy} tracking ${removedByAddy === '1' ? 'pixel' : 'pixels'} from this email before forwarding it. ${trackers.length ? 'The ones below are what was left.' : 'Nothing else was found.'}`
        : "This email came through an addy.io alias. If Block Tracking Pixels is on for your account, addy.io removes trackers before forwarding, so you'll only see what was left."
    )
    results.append(note)
  }

  // Each tracker, grouped by host
  if (trackers.length) {
    const groups = new Map()
    for (const tracker of trackers) {
      const group = groups.get(tracker.label) ?? { ...tracker, count: 0, reasons: new Set() }
      group.count++
      group.reasons.add(tracker.reason)
      groups.set(tracker.label, group)
    }

    const list = section(
      'Trackers found',
      "Each of these images loads from the sender's server when you open the email, which tells them you opened it."
    )
    const ul = el('ul', 'tc-list')
    for (const group of groups.values()) {
      const li = el('li', 'tc-item')
      const head = el('div', 'tc-item-head')
      head.append(el('span', 'mono tc-host', group.label))
      if (group.count > 1) head.append(el('span', 'ha-muted', `×${group.count}`))
      for (const reason of group.reasons)
        head.append(
          el('span', `ha-chip ${reason === 'known' ? 'is-fail' : 'is-neutral'}`, REASONS[reason][0])
        )
      li.append(head)

      const service = await serviceFor(group.label)
      const why = [...group.reasons].map((reason) => REASONS[reason][1]).join(' ')
      li.append(el('p', 'tc-why', service ? `Run by ${service}. ${why}` : why))
      if (group.src && !/^data:/i.test(group.src)) li.append(el('p', 'mono tc-src', group.src))
      ul.append(li)
    }
    list.append(ul)
    if (kept)
      list.append(
        el(
          'p',
          'ha-card-intro',
          `The other ${kept} ${kept === 1 ? 'image' : 'images'} in this email ${kept === 1 ? 'looks' : 'look'} normal and would be left alone.`
        )
      )
    results.append(list)

    const reveals = section(
      'What a tracking pixel tells the sender',
      "When your email app loads the image, the sender's server can record:"
    )
    const notes = el('ul', 'ha-notes')
    for (const text of [
      'That you opened the email, and when, every time you open it.',
      'Your IP address, which shows roughly where you are and which internet provider you use.',
      'Which email app and device you used.',
      'That your address is real and read, which makes it more valuable to spammers.',
    ]) {
      notes.append(el('li', null, text))
    }
    reveals.append(notes)
    results.append(reveals)
  }

  scrollToResults()
}

const scrollToResults = () => {
  const smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches
  results.firstElementChild?.scrollIntoView({
    behavior: smooth ? 'smooth' : 'auto',
    block: 'start',
  })
}

if (form) {
  // The last opened file, so checking again uses its original bytes rather than the copy shown in the box
  let opened = null
  const run = () =>
    opened && input.value === opened.shown
      ? check(opened.text, true, opened.truncated)
      : check(input.value)

  form.addEventListener('submit', (e) => {
    e.preventDefault()
    run()
  })

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && (e.metaKey || e.ctrlKey)) {
      e.preventDefault()
      run()
    }
  })

  exampleButton.addEventListener('click', () => {
    input.value = EXAMPLE
    check(EXAMPLE)
  })

  // Read as Latin-1 so encoded parts keep their original bytes. The HTML can come after the attachments, so read
  // up to the largest email most providers accept. Only the start is shown in the box, as a huge textarea is slow
  const openFile = (file) => {
    if (!file) return
    const truncated = file.size > MAX_FILE_MB * 1024 * 1024
    const reader = new FileReader()
    reader.onload = () => {
      const text = reader.result
      input.value = text.length > 200000 ? text.slice(0, 200000) + '\n…' : text
      opened = { shown: input.value, text, truncated }
      check(text, true, truncated)
    }
    reader.readAsText(file.slice(0, MAX_FILE_MB * 1024 * 1024), 'latin1')
  }

  fileInput.addEventListener('change', () => openFile(fileInput.files[0]))

  input.addEventListener('dragover', (e) => e.preventDefault())
  input.addEventListener('drop', (e) => {
    if (!e.dataTransfer.files.length) return
    e.preventDefault()
    openFile(e.dataTransfer.files[0])
  })
}
