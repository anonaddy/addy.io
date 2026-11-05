// Bounce message lookup on /smtp-errors/. Everything runs here in the browser: the pasted text is never sent anywhere
const form = document.getElementById('lookup')
const input = document.getElementById('bounce-text')
const results = document.getElementById('lookup-results')

const entries = [...document.querySelectorAll('[data-smtp-entry]')].map((el) => ({
  code: el.dataset.code,
  status: el.dataset.status,
  name: el.dataset.name,
  kind: el.dataset.kind,
  match: el.dataset.match ? el.dataset.match.split('|').map((m) => m.toLowerCase()) : [],
  href: el.getAttribute('href'),
}))

const classes = {
  2: 'Success: the email was accepted.',
  4: 'Temporary failure: the sending server keeps retrying, usually for a few days.',
  5: 'Permanent failure: the sending server has given up on this email.',
}

const subjects = {
  0: 'an unspecified problem',
  1: 'a problem with the address',
  2: 'a problem with the mailbox',
  3: 'a problem with the receiving mail system',
  4: 'a network or routing problem',
  5: 'a problem with the SMTP conversation',
  6: 'a problem with the message content',
  7: 'a security or policy problem',
}

// "550 5.1.1" or "550-5.1.1", and status codes on their own. The lookarounds skip IP addresses such as 4.2.2.1
const fullPattern = /(?<![\d.])([245]\d\d)[ -]#?([245]\.\d{1,3}\.\d{1,3})(?![\d.]*\d)/g
const statusPattern = /(?<![\d.])([245]\.\d{1,3}\.\d{1,3})(?!\.?\d)/g

const lineAround = (text, index) => {
  const start = text.lastIndexOf('\n', index) + 1
  const end = text.indexOf('\n', index)
  const line = text.slice(start, end === -1 ? undefined : end).trim()
  return line.length > 200 ? `${line.slice(0, 197)}...` : line
}

// Bounce text is often wrapped over several lines, so match wording on the text that follows each code with spaces squashed
const squash = (text) => text.replace(/\s+/g, ' ').toLowerCase()
const contextAround = (text, index) =>
  squash(text.slice(text.lastIndexOf('\n', index) + 1, index + 300))

const findCodes = (text) => {
  const found = new Map()

  for (const m of text.matchAll(fullPattern)) {
    const key = `${m[1]} ${m[2]}`
    if (!found.has(key))
      found.set(key, {
        code: m[1],
        status: m[2],
        line: lineAround(text, m.index),
        context: contextAround(text, m.index),
      })
  }

  for (const m of text.matchAll(statusPattern)) {
    const alreadyFound = [...found.values()].some((f) => f.status === m[1])
    if (!alreadyFound)
      found.set(m[1], {
        code: null,
        status: m[1],
        line: lineAround(text, m.index),
        context: contextAround(text, m.index),
      })
  }

  return [...found.values()]
}

const entryFor = ({ code, status, context }) => {
  const sameStatus = entries.filter((e) => e.status === status)

  const matches = (e) => e.match.some((m) => context.includes(m))

  // Wording beats the number, so Microsoft's 5.1.10 "RecipientNotFound" lands on the 5.1.1 page
  return (
    sameStatus.find((e) => e.code === code && matches(e)) ||
    sameStatus.find(matches) ||
    entries.find(matches) ||
    sameStatus.find((e) => e.code === code) ||
    sameStatus[0]
  )
}

const el = (tag, className, text) => {
  const node = document.createElement(tag)
  if (className) node.className = className
  if (text) node.textContent = text
  return node
}

const resultCard = (finding) => {
  const entry = entryFor(finding)
  const [cls, subject] = finding.status ? finding.status.split('.') : [finding.code[0]]
  const card = el('div', 'card err-result')

  card.append(
    el('p', 'mono err-item-code', [finding.code, finding.status].filter(Boolean).join(' '))
  )

  if (entry) {
    card.append(el('h3', null, entry.name))
  } else {
    const about = finding.status
      ? (subjects[subject] ?? 'an unrecognised problem')
      : (classes[cls]?.split(':')[0] ?? 'an unrecognised reply')
    card.append(el('h3', null, about.charAt(0).toUpperCase() + about.slice(1)))
  }

  card.append(el('p', null, classes[cls] ?? ''))

  if (finding.line) {
    const quote = el('p', 'err-result-line')
    quote.append(el('code', null, finding.line))
    card.append(quote)
  }

  if (entry) {
    const link = el('a', 'text-link', 'Read the full explanation →')
    link.href = entry.href
    card.append(link)
  } else {
    const which = finding.status || `a ${finding.code} reply with no status code`
    card.append(
      el(
        'p',
        'err-result-hint',
        `There isn't a page for ${which} yet. The text after the code usually explains the reason.`
      )
    )
  }

  return card
}

const explain = () => {
  const text = input.value
  results.replaceChildren()

  if (!text.trim()) return

  let findings = findCodes(text)

  // No status code, but the wording matches a known error, such as Postfix's "Host or domain name not found"
  if (!findings.length) {
    const all = squash(text)
    const byWording = entries.find((e) => e.match.some((m) => all.includes(m)))
    if (byWording)
      findings = [{ code: byWording.code, status: byWording.status, line: '', context: all }]
  }

  // Only a reply code, such as "550 Unknown account"
  if (!findings.length) {
    const reply = text.match(/(?<![\d.])([245]\d\d)(?=[ -])/)
    if (reply)
      findings = [{ code: reply[1], status: '', line: lineAround(text, reply.index), context: '' }]
  }

  if (!findings.length) {
    const none = el('div', 'card err-result')
    none.append(el('h3', null, 'No error code found'))
    none.append(
      el(
        'p',
        null,
        'Paste the whole bounce message, including the line with a code such as 550 5.1.1 or 452 4.2.2. It is often near the words "Diagnostic-Code" or "Remote server returned".'
      )
    )
    results.append(none)
    return
  }

  results.append(
    el(
      'p',
      'err-results-count',
      findings.length === 1 ? 'Found 1 error code' : `Found ${findings.length} error codes`
    )
  )
  findings.slice(0, 5).forEach((f) => results.append(resultCard(f)))
  const smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches
  results
    .querySelector('.err-result')
    .scrollIntoView({ behavior: smooth ? 'smooth' : 'auto', block: 'nearest' })
}

if (form) {
  form.addEventListener('submit', (e) => {
    e.preventDefault()
    explain()
  })

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && (e.metaKey || e.ctrlKey)) {
      e.preventDefault()
      explain()
    }
  })
}
