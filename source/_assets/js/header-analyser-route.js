// Parsing of Received headers and the explanation of delays in an email's route, kept apart from the page so it can be tested with node --test

// Domains that identify well-known email services, checked against Received hosts, DKIM domains and the envelope sender
export const SERVICES = [
  ['amazonses.com', 'Amazon SES'],
  ['sendgrid.net', 'SendGrid'],
  ['mailgun.org', 'Mailgun'],
  ['mailgun.net', 'Mailgun'],
  ['mcsv.net', 'Mailchimp'],
  ['mcdlv.net', 'Mailchimp'],
  ['rsgsv.net', 'Mailchimp'],
  ['mandrillapp.com', 'Mailchimp Transactional'],
  ['sparkpostmail.com', 'SparkPost'],
  ['mtasv.net', 'Postmark'],
  ['postmarkapp.com', 'Postmark'],
  ['hubspotemail.net', 'HubSpot'],
  ['klaviyomail.com', 'Klaviyo'],
  ['exacttarget.com', 'Salesforce Marketing Cloud'],
  ['customeriomail.com', 'Customer.io'],
  ['brevo.com', 'Brevo'],
  ['sendinblue.com', 'Brevo'],
  ['zoho.com', 'Zoho Mail'],
  ['zohomail.eu', 'Zoho Mail'],
  ['protection.outlook.com', 'Microsoft 365'],
  ['outlook.com', 'Outlook'],
  ['google.com', 'Google'],
  ['protonmail.ch', 'Proton Mail'],
  ['proton.me', 'Proton Mail'],
  ['icloud.com', 'iCloud Mail'],
  ['yahoo.com', 'Yahoo'],
  ['yahoodns.net', 'Yahoo'],
  ['aol.com', 'AOL'],
  ['gmx.net', 'GMX'],
  ['web.de', 'WEB.DE'],
  ['fastmail.com', 'Fastmail'],
  ['messagingengine.com', 'Fastmail'],
  ['tutanota.de', 'Tuta'],
  ['mailbox.org', 'mailbox.org'],
  ['anonaddy.me', 'addy.io'],
  ['anonaddy.com', 'addy.io'],
  ['addy.io', 'addy.io'],
]

// Two-part public suffixes, so mail.example.co.uk and example.co.uk count as the same organisation
const TWO_PART_SUFFIXES = [
  'co.uk',
  'org.uk',
  'ac.uk',
  'gov.uk',
  'me.uk',
  'com.au',
  'net.au',
  'org.au',
  'co.nz',
  'co.jp',
  'co.za',
  'com.br',
  'com.mx',
  'co.in',
  'com.cn',
  'com.tr',
  'com.sg',
]

const ADDY_DOMAINS = ['anonaddy.me', 'anonaddy.com', 'addy.io']

const IP = /^(?:\d{1,3}(?:\.\d{1,3}){3}|[0-9a-f]*:[0-9a-f:.]+)$/i

// Words that follow "by" when a server leaves its own name out, as Yahoo does with "by with SMTPs"
const CLAUSE_WORDS = ['with', 'id', 'for', 'via', 'from']

export const orgDomain = (domain) => {
  if (!domain) return null
  const labels = domain.toLowerCase().replace(/\.$/, '').split('.')
  const lastTwo = labels.slice(-2).join('.')
  return labels.slice(TWO_PART_SUFFIXES.includes(lastTwo) ? -3 : -2).join('.')
}

export const isAddyHost = (host) => Boolean(host && ADDY_DOMAINS.includes(orgDomain(host)))

// The name of the email provider a server belongs to, or its domain when it isn't a well-known one
export const providerName = (host) => {
  const name = host.toLowerCase().replace(/\.$/, '')
  const service = SERVICES.find(([domain]) => name === domain || name.endsWith(`.${domain}`))
  return service?.[1] ?? orgDomain(name)
}

export const parseReceived = (value) => {
  const semicolon = value.lastIndexOf(';')
  const datePart =
    semicolon === -1
      ? ''
      : value
          .slice(semicolon + 1)
          .replace(/\([^)]*\)/g, '')
          .trim()
  const routePart = semicolon === -1 ? value : value.slice(0, semicolon)
  const date = datePart ? new Date(datePart) : null
  const fromClause =
    routePart.match(/\bfrom\s+(.+?)(?=\s+by\s|\s+with\s|\s+id\s|\s+for\s|$)/i)?.[1] ?? ''
  const fromName = fromClause.match(/^(\S+)/)?.[1] ?? null
  // Yahoo names the sending server by IP and puts the name it gave in brackets: "from 192.0.2.25 (EHLO mail2.anonaddy.me)"
  const helo = fromClause.match(/\((?:EHLO|HELO)\s+([^\s)]+)\)/i)?.[1] ?? null
  const fromIsIp = Boolean(fromName && IP.test(fromName))
  const by = routePart.match(/\bby\s+(\S+)/i)?.[1] ?? null

  return {
    from: fromIsIp && helo ? helo : fromName,
    fromIp:
      fromClause.match(/\[(?:IPv6:)?([0-9a-f:.]+)\]/i)?.[1] ??
      (fromIsIp ? fromName : (fromClause.match(/\(((?:\d{1,3}\.){3}\d{1,3})\)/)?.[1] ?? null)),
    by: by && !CLAUSE_WORDS.includes(by.toLowerCase()) ? by : null,
    with: routePart.match(/\bwith\s+(Microsoft SMTP Server|[A-Za-z0-9]+)/i)?.[1] ?? null,
    tls: /\bwith\s+\w*SMTPSA?\b/i.test(routePart) || /version=TLS|cipher=|\bTLSv?1/i.test(value),
    date: date && !Number.isNaN(date.getTime()) ? date : null,
  }
}

// The server that received the email at a hop. When it didn't name itself, the next hop is the same provider passing it on internally
export const receiverOf = (hops, i) => hops[i].by ?? hops[i + 1]?.by ?? null

export const SLOW_DELAY = 60000

/**
 * Explains each slow hop of an email that came through addy.io, so it's clear whether the delay happened before
 * addy.io, while handing it to the recipient's email provider, or inside that provider. Hops are oldest first.
 * Returns one entry per hop: null, or { kind, provider } where kind is 'before-addy', 'handoff' or 'after-handoff'.
 */
export const explainDelays = (hops) => {
  const receivers = hops.map((_, i) => receiverOf(hops, i))
  const firstAddy = receivers.findIndex(isAddyHost)
  if (firstAddy === -1) return hops.map(() => null)

  let previous = null

  return hops.map((hop, i) => {
    if (!hop.date) return null
    const held = previous
    previous = i
    if (held === null || hop.date - hops[held].date < SLOW_DELAY) return null

    const heldBy = receivers[held]
    const receiver = receivers[i]

    if (isAddyHost(heldBy)) {
      if (isAddyHost(receiver)) return null
      return { kind: 'handoff', provider: receiver ? providerName(receiver) : null }
    }
    if (i <= firstAddy) return { kind: 'before-addy', provider: null }
    return { kind: 'after-handoff', provider: heldBy ? providerName(heldBy) : null }
  })
}
