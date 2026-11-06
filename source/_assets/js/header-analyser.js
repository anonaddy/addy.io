// Email header analyser on /tools/email-header-analyser/. Everything runs here in the browser: nothing pasted or opened is sent anywhere
import {
  SERVICES,
  SLOW_DELAY,
  explainDelays,
  orgDomain,
  parseReceived,
  providerName,
  receiverOf,
} from './header-analyser-route'

const form = document.getElementById('analyser')
const input = document.getElementById('header-text')
const fileInput = document.getElementById('header-file')
const exampleButton = document.getElementById('header-example')
const results = document.getElementById('analyser-results')

const EXAMPLE = `Delivered-To: johndoe@example.net
Return-Path: <shop@johndoe.anonaddy.com>
Received: by 2002:a05:6a20:1234 with SMTP id x12csp345678pzb;
        Tue, 3 Nov 2026 09:14:52 -0800 (PST)
Authentication-Results: mx.example.net;
       dkim=pass header.i=@anonaddy.com header.s=default;
       spf=pass smtp.mailfrom=shop@johndoe.anonaddy.com;
       dmarc=pass (p=QUARANTINE) header.from=anonaddy.com
Received: from mail2.anonaddy.me (mail2.anonaddy.me. [192.0.2.25])
        by mx.example.net with ESMTPS id a1si2345678wrx.12
        for <johndoe@example.net>
        (version=TLS1_3 cipher=TLS_AES_256_GCM_SHA384 bits=256/256);
        Tue, 3 Nov 2026 09:14:51 -0800 (PST)
DKIM-Signature: v=1; a=rsa-sha256; c=relaxed/relaxed; d=anonaddy.com; s=default; h=from:to:subject:date; bh=abc=; b=def=
X-AnonAddy-Authentication-Results: mail2.anonaddy.me; dkim=pass header.d=shop.example; dmarc=pass (policy=reject) header.from=shop.example; spf=pass smtp.mailfrom=bounce@mailer.shop.example
X-AnonAddy-Original-Sender: news@shop.example
X-AnonAddy-Original-Envelope-From: bounce@mailer.shop.example
Received: from smtp.mailer.shop.example (smtp.mailer.shop.example [198.51.100.7])
        by mail2.anonaddy.me (Postfix) with ESMTPS id 4Xk2pQ1zW9z9sWm
        for <shop@johndoe.anonaddy.com>; Tue, 3 Nov 2026 17:14:49 +0000 (UTC)
DKIM-Signature: v=1; a=rsa-sha256; c=relaxed/relaxed; d=shop.example; s=s1; h=from:to:subject:date; bh=ghi=; b=jkl=
Received: from app-server-3 (unknown [10.0.0.12])
        by smtp.mailer.shop.example (Postfix) with ESMTP id 8F2A11C0042
        for <shop@johndoe.anonaddy.com>; Tue, 3 Nov 2026 17:12:03 +0000 (UTC)
From: "Example Shop" <shop@johndoe.anonaddy.com>
To: shop@johndoe.anonaddy.com
Subject: =?UTF-8?B?WW91ciBvcmRlciBoYXMgc2hpcHBlZCDwn5qa?=
Date: Tue, 3 Nov 2026 17:12:02 +0000
Message-ID: <20261103171202.8F2A11C0042@mailer.shop.example>
List-Unsubscribe: <mailto:unsubscribe@mailer.shop.example>
MIME-Version: 1.0
Content-Type: text/html; charset=UTF-8`

const el = (tag, className, text) => {
  const node = document.createElement(tag)
  if (className) node.className = className
  if (text !== undefined && text !== null) node.textContent = text
  return node
}

// Headers end at the first blank line. Continuation lines start with whitespace and belong to the header above
const parseHeaders = (raw) => {
  const text = raw.replace(/\r\n?/g, '\n').replace(/^\s*\n/, '')
  const end = text.search(/\n[ \t]*\n/)
  const block = end === -1 ? text : text.slice(0, end)
  const headers = []

  for (const line of block.split('\n')) {
    if (/^[ \t]/.test(line) && headers.length) {
      headers[headers.length - 1].value += ' ' + line.trim()
    } else {
      const m = line.match(/^([!-9;-~]+):[ \t]?(.*)$/)
      if (m) headers.push({ name: m[1], value: m[2].trim() })
    }
  }

  return headers
}

const all = (headers, name) =>
  headers.filter((h) => h.name.toLowerCase() === name.toLowerCase()).map((h) => h.value)
const first = (headers, name) => all(headers, name)[0] ?? null

// =?charset?B?...?= and =?charset?Q?...?= encoded words, used for non-ASCII subjects and names
const decodeWords = (value) => {
  if (!value) return value
  return value.replace(
    /=\?([^?]+)\?([BbQq])\?([^?]*)\?=(\s+(?==\?))?/g,
    (match, charset, encoding, data) => {
      try {
        let bytes
        if (encoding.toUpperCase() === 'B') {
          bytes = Uint8Array.from(atob(data), (c) => c.charCodeAt(0))
        } else {
          const text = data.replace(/_/g, ' ')
          const out = []
          for (let i = 0; i < text.length; i++) {
            if (text[i] === '=' && /^[0-9a-f]{2}$/i.test(text.slice(i + 1, i + 3))) {
              out.push(parseInt(text.slice(i + 1, i + 3), 16))
              i += 2
            } else {
              out.push(text.charCodeAt(i))
            }
          }
          bytes = Uint8Array.from(out)
        }
        return new TextDecoder(charset).decode(bytes)
      } catch {
        return match
      }
    }
  )
}

const addressIn = (value) => {
  if (!value) return null
  const angle = value.match(/<([^<>\s]+@[^<>\s]+)>/)
  const bare = value.match(/[^\s<>"(),;:]+@[^\s<>"(),;:]+/)
  return (angle?.[1] ?? bare?.[0] ?? null)?.replace(/^mailto:/i, '')
}

const domainOf = (address) => {
  if (!address) return null
  const domain = address
    .split('@')
    .pop()
    .replace(/[>\].]+$/, '')
    .toLowerCase()
  return domain || null
}

const aligned = (a, b) => Boolean(a && b && orgDomain(a) === orgDomain(b))

// "mx.google.com; dkim=pass header.i=@example.com; spf=pass (...) smtp.mailfrom=x@example.com; dmarc=pass (p=REJECT) header.from=example.com"
const parseAuthResults = (value) => {
  if (!value) return null
  // Microsoft leaves out the server name, so the first part is only the server when it isn't itself a result
  const lead = value
    .split(';')[0]
    .replace(/^\s*i=\d+\s*/, '')
    .trim()
  const results = {
    server: lead.includes('=') ? null : lead,
    spf: [],
    dkim: [],
    dmarc: [],
    arc: [],
    compauth: [],
  }

  for (const m of value.matchAll(/\b(spf|dkim|dmarc|arc|compauth)=([a-z]+)([^;]*)/gi)) {
    const method = m[1].toLowerCase()
    const rest = m[3]
    const prop = (name) =>
      rest.match(new RegExp(`${name.replace('.', '\\.')}=@?([^\\s;)]+)`, 'i'))?.[1] ?? null
    results[method].push({
      result: m[2].toLowerCase(),
      domain:
        [
          prop('header.d'),
          domainOf(prop('header.i')),
          prop('header.from'),
          domainOf(prop('smtp.mailfrom')),
          prop('smtp.helo'),
        ].find((d) => d && d !== 'none') ?? null,
      policy: rest.match(/\b(?:p|policy)=([a-z]+)/i)?.[1]?.toLowerCase() ?? null,
    })
  }

  return results
}

const formatDelay = (ms) => {
  const s = Math.round(ms / 1000)
  if (s < 60) return `${s}s`
  const m = Math.floor(s / 60)
  if (m < 60) return `${m}m ${s % 60}s`
  const h = Math.floor(m / 60)
  if (h < 48) return `${h}h ${m % 60}m`
  return `${Math.floor(h / 24)} days`
}

const formatDate = (date) =>
  date.toLocaleString(undefined, { dateStyle: 'medium', timeStyle: 'medium' })

const chip = (result) => {
  const kind =
    result === 'pass'
      ? 'is-pass'
      : ['fail', 'hardfail', 'permerror'].includes(result)
        ? 'is-fail'
        : 'is-neutral'
  return el('span', `ha-chip ${kind}`, result ?? 'none')
}

const section = (title, intro) => {
  const card = el('div', 'card ha-card')
  card.append(el('h2', 'ha-card-title', title))
  if (intro) card.append(el('p', 'ha-card-intro', intro))
  return card
}

const rows = (pairs) => {
  const dl = el('dl', 'ha-rows')
  for (const [label, value] of pairs) {
    if (!value) continue
    dl.append(el('dt', null, label))
    const dd = el('dd')
    if (value instanceof Node) dd.append(value)
    else dd.textContent = value
    dl.append(dd)
  }
  return dl
}

const authTable = (auth) => {
  const dl = el('dl', 'ha-rows')
  for (const method of ['dmarc', 'spf', 'dkim', 'arc', 'compauth']) {
    for (const r of auth[method]) {
      dl.append(el('dt', null, method.toUpperCase()))
      const dd = el('dd', 'ha-auth')
      dd.append(chip(r.result))
      if (r.domain) dd.append(el('span', 'mono', r.domain))
      if (r.policy) dd.append(el('span', 'ha-muted', `policy: ${r.policy}`))
      dl.append(dd)
    }
  }
  return dl
}

// Says where a slow hop's delay happened, so a delay at the recipient's email provider isn't taken for addy.io's
const delayNote = ({ kind, provider }, delay) => {
  const note = el('div', 'ha-hop-note')
  const name = provider ?? 'the receiving email provider'

  if (kind === 'handoff') {
    note.append(el('p', 'ha-hop-note-title', `Delayed by ${provider ?? 'the receiving provider'}`))
    const text = el(
      'p',
      null,
      `addy.io had already forwarded this email, but it took ${delay} for ${name} to accept it. That's almost always ${name} temporarily deferring incoming mail, for example to rate limit it or run extra spam checks. addy.io keeps retrying automatically until it's accepted, so nothing is lost. If it happens often, ${name} can tell you why they're deferring it. `
    )
    const link = el('a', null, 'Why are forwarded emails delayed?')
    link.href = '/help/why-are-forwarded-emails-delayed/'
    text.append(link)
    note.append(text)
  } else if (kind === 'before-addy') {
    note.append(el('p', 'ha-hop-note-title', 'Delayed before reaching addy.io'))
    note.append(
      el(
        'p',
        null,
        `This ${delay} delay happened before the email reached addy.io, while it was with the sender or their email provider.`
      )
    )
  } else {
    note.append(
      el('p', 'ha-hop-note-title', `Delayed inside ${provider ?? 'the receiving provider'}`)
    )
    note.append(
      el(
        'p',
        null,
        `This ${delay} delay happened after ${name} accepted the email from addy.io, while it was passing between ${name}'s own servers.`
      )
    )
  }

  return note
}

const verdict = (auth, fromDomain) => {
  const dmarc = auth?.dmarc[0]
  const passed = (method) =>
    auth?.[method].some((r) => r.result === 'pass' && aligned(r.domain, fromDomain))

  if (dmarc?.result === 'pass') {
    return [
      'is-pass',
      'Passed DMARC',
      `The From address domain${fromDomain ? `, ${fromDomain},` : ''} was verified. This email really was sent by or for that domain.`,
    ]
  }
  if (dmarc?.result === 'fail') {
    return [
      'is-fail',
      'Failed DMARC',
      `Neither SPF nor DKIM passed for ${fromDomain ?? 'the From address domain'}. The From address may be forged, so be careful with links and attachments.`,
    ]
  }
  if (passed('dkim') || passed('spf')) {
    return [
      'is-neutral',
      'Authenticated, no DMARC result',
      'SPF or DKIM passed for the From address domain, but there was no DMARC result. The domain may not publish a DMARC policy.',
    ]
  }
  if (auth) {
    return [
      'is-neutral',
      'Not verified',
      "Nothing verified the From address domain. That doesn't prove it's fake, but treat the sender with some caution.",
    ]
  }
  return [
    'is-neutral',
    'No authentication results',
    "These headers have no Authentication-Results line, so there's nothing to show whether the sender was verified. Make sure you copied all the headers, including the ones at the top.",
  ]
}

const analyse = (raw) => {
  results.replaceChildren()
  if (!raw.trim()) return

  const headers = parseHeaders(raw)
  if (!headers.length) {
    const card = section(
      'No headers found',
      'Paste the headers or the full source of an email. They start with lines like "Received:", "From:" and "Subject:".'
    )
    results.append(card)
    return
  }

  const fromHeader = decodeWords(first(headers, 'From'))
  const fromDomain = domainOf(addressIn(fromHeader))
  const returnPath = addressIn(first(headers, 'Return-Path'))
  const auth = parseAuthResults(
    first(headers, 'Authentication-Results') ?? first(headers, 'ARC-Authentication-Results')
  )
  const receivedSpf = first(headers, 'Received-SPF')
    ?.match(/^(\w+)/)?.[1]
    ?.toLowerCase()
  if (auth && !auth.spf.length && receivedSpf)
    auth.spf.push({ result: receivedSpf, domain: domainOf(returnPath), policy: null })
  const dkimDomains = all(headers, 'DKIM-Signature')
    .map((v) => v.match(/\bd=([^;\s]+)/)?.[1]?.toLowerCase())
    .filter(Boolean)

  // Forwarded by addy.io: the top results are addy.io's delivery to the inbox, and the original sender's are kept in their own header
  const addyAuth = parseAuthResults(first(headers, 'X-AnonAddy-Authentication-Results'))
  const originalSender = first(headers, 'X-AnonAddy-Original-Sender')
  const originalDomain = domainOf(originalSender) ?? addyAuth?.dmarc[0]?.domain

  // Verdict
  const [kind, title, text] = addyAuth
    ? verdict(addyAuth, originalDomain)
    : verdict(auth, fromDomain)
  const summary = el('div', `card ha-verdict ${kind}`)
  summary.append(el('p', 'ha-verdict-label', addyAuth ? 'Original sender' : 'Sender check'))
  summary.append(el('h2', null, title))
  summary.append(el('p', null, text))
  results.append(summary)

  if (addyAuth) {
    const card = section(
      'Forwarded by addy.io',
      "This email came through an addy.io alias. addy.io checked the original sender when it arrived, and those results are below. The From address you see has been changed to your alias, so the results at the top of the headers are for addy.io's delivery to your inbox, not the original sender."
    )
    card.append(
      rows([
        ['Original sender', originalSender],
        ['Envelope sender', first(headers, 'X-AnonAddy-Original-Envelope-From')],
        ['Checked by', addyAuth.server],
      ])
    )
    card.append(authTable(addyAuth))
    results.append(card)
  }

  // Overview
  const subject = decodeWords(first(headers, 'Subject'))
  const dateHeader = first(headers, 'Date')
  const parsedDate = dateHeader ? new Date(dateHeader.replace(/\([^)]*\)/g, '').trim()) : null
  const searchable = [
    ...all(headers, 'Received'),
    ...dkimDomains,
    returnPath ?? '',
    first(headers, 'Message-ID') ?? '',
    first(headers, 'Feedback-ID') ?? '',
  ]
    .join(' ')
    .toLowerCase()
  const services = [
    ...new Set(
      SERVICES.filter(([domain]) =>
        new RegExp(`(^|[^a-z0-9-])${domain.replace(/\./g, '\\.')}`).test(searchable)
      ).map(([, name]) => name)
    ),
  ]

  const overview = section('Overview')
  overview.append(
    rows([
      ['From', fromHeader],
      ['To', decodeWords(first(headers, 'To'))],
      ['Reply-To', decodeWords(first(headers, 'Reply-To'))],
      ['Subject', subject],
      [
        'Date',
        parsedDate && !Number.isNaN(parsedDate.getTime()) ? formatDate(parsedDate) : dateHeader,
      ],
      ['Envelope sender', returnPath],
      ['Message-ID', first(headers, 'Message-ID')],
      ['Sent with', first(headers, 'X-Mailer') ?? first(headers, 'User-Agent')],
      ['Services seen', services.join(', ')],
      [
        'Unsubscribe link',
        first(headers, 'List-Unsubscribe')
          ? 'Yes, this looks like a mailing list or newsletter'
          : null,
      ],
    ])
  )
  results.append(overview)

  // Authentication at the final hop
  if (auth) {
    const card = section(
      'Authentication',
      `Checked by ${auth.server || 'the receiving server'}. These results were added by the last server to handle the email, which is usually your own email provider.`
    )
    card.append(authTable(auth))

    const notes = el('ul', 'ha-notes')
    const dkimFor = auth.dkim.find((r) => r.result === 'pass')?.domain ?? dkimDomains[0]
    if (fromDomain && dkimFor && !aligned(dkimFor, fromDomain)) {
      notes.append(
        el(
          'li',
          null,
          `The DKIM signature is for ${dkimFor}, not the From address domain ${fromDomain}. That's normal for some email services, but it means DKIM alone doesn't prove who sent it.`
        )
      )
    }
    const mailFrom = domainOf(returnPath)
    if (fromDomain && mailFrom && !aligned(mailFrom, fromDomain)) {
      notes.append(
        el(
          'li',
          null,
          `The envelope sender domain ${mailFrom} is different to the From address domain ${fromDomain}, so SPF can't count towards DMARC.`
        )
      )
    }
    if (notes.childElementCount) card.append(notes)
    results.append(card)
  }

  // Route, oldest first
  const hops = all(headers, 'Received').map(parseReceived).reverse()
  if (hops.length) {
    const firstDate = hops.find((h) => h.date)?.date
    const lastDate = [...hops].reverse().find((h) => h.date)?.date
    const total = firstDate && lastDate ? lastDate - firstDate : null
    const card = section(
      'Route',
      `${hops.length} ${hops.length === 1 ? 'hop' : 'hops'}, oldest first${total !== null && total >= 0 ? `. Total time: ${formatDelay(total)}` : ''}.`
    )
    const list = el('ol', 'ha-hops')
    const explanations = explainDelays(hops)
    let previous = null

    hops.forEach((hop, i) => {
      const item = el('li', 'ha-hop')
      const head = el('div', 'ha-hop-head')
      head.append(el('span', 'ha-hop-num mono', String(i + 1)))
      const route = el('span', 'ha-hop-route')
      route.append(el('span', 'mono', hop.from ?? 'internal'))
      route.append(el('span', 'ha-muted', ' → '))
      const receiver = receiverOf(hops, i)
      route.append(
        hop.by
          ? el('span', 'mono', hop.by)
          : el('span', 'ha-muted', receiver ? `a ${orgDomain(receiver)} server` : 'unknown')
      )
      head.append(route)

      let delay = null
      if (previous?.date && hop.date) {
        delay = hop.date - previous.date
        const label = delay < 0 ? 'clock skew' : `+${formatDelay(delay)}`
        head.append(el('span', `ha-delay ${delay >= SLOW_DELAY ? 'is-slow' : ''}`, label))
      }
      item.append(head)

      const meta = [
        hop.fromIp ? `IP ${hop.fromIp}` : null,
        hop.with ? `via ${hop.with}` : null,
        hop.tls ? 'encrypted (TLS)' : null,
        hop.date ? formatDate(hop.date) : 'no time',
      ].filter(Boolean)
      item.append(el('p', 'ha-hop-meta', meta.join(' · ')))
      if (explanations[i]) item.append(delayNote(explanations[i], formatDelay(delay)))
      list.append(item)
      if (hop.date) previous = hop
    })

    card.append(list)
    card.append(
      el(
        'p',
        'ha-card-intro',
        'Times are shown in your own time zone. Delays over a minute are highlighted. "Clock skew" means a server\'s clock was wrong, not that the email went back in time.'
      )
    )
    results.append(card)
  }

  // Every header, for reference
  const everything = el('details', 'card ha-card ha-all')
  everything.append(el('summary', null, `All ${headers.length} headers`))
  const dl = el('dl', 'ha-rows ha-rows-all')
  for (const h of headers) {
    dl.append(el('dt', 'mono', h.name))
    dl.append(el('dd', 'mono', h.value))
  }
  everything.append(dl)
  results.append(everything)

  const smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches
  results.firstElementChild.scrollIntoView({ behavior: smooth ? 'smooth' : 'auto', block: 'start' })
}

if (form) {
  form.addEventListener('submit', (e) => {
    e.preventDefault()
    analyse(input.value)
  })

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && (e.metaKey || e.ctrlKey)) {
      e.preventDefault()
      analyse(input.value)
    }
  })

  exampleButton.addEventListener('click', () => {
    input.value = EXAMPLE
    analyse(EXAMPLE)
  })

  // Only the start of the file is read, as headers come before the body and attachments
  const openFile = (file) => {
    if (!file) return
    file
      .slice(0, 256 * 1024)
      .text()
      .then((text) => {
        input.value = text
        analyse(text)
      })
  }

  fileInput.addEventListener('change', () => openFile(fileInput.files[0]))

  input.addEventListener('dragover', (e) => e.preventDefault())
  input.addEventListener('drop', (e) => {
    if (!e.dataTransfer.files.length) return
    e.preventDefault()
    openFile(e.dataTransfer.files[0])
  })
}
