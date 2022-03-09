---
title: "Security"
description: This page contains security details about AnonAddy. Measures are taken to keep your data safe and secure such as HSTS, encryption of sensitive details in the database and strong cipher suite preference.
extends: _layouts.master
section: body
---

<h1 class="w-full text-center">Security</h1>
<div class="w-full mt-4 mb-12">
  <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
</div>

## The mail servers

- mail.anonaddy.me (Greenhost.net, Netherlands)
- mail2.anonaddy.me (UpCloud.com, Poland)

Both mail servers have the following in place:

### TLS encryption

Opportunistic DANE TLS encryption with strong cipher preference is used for all emails sent through our service.

DNS-based Authentification of Named Entities (DANE) helps protect against MiTM (Man in The Middle) downgrade attacks. It does this by instructing cooperating mail servers to expect encrypted communication and to verify the destination's certificate by checking their TLSA DNS record.

SMTP MTA Strict Transport Security (MTA-STS) is used on all shared domains, this is similar to DANE in that it is designed to avoid (Man in The Middle) downgrade attacks and verify the destination.

SMTP TLS Reporting (TLS-RPT) is also used. This allows us to receive daily reports from external mail servers that connect to an AnonAddy domain. These reports can be used to detect potential attacks and identify any connection problems. Check out our security report by running a scan on [Hardenize](https://www.hardenize.com/report/anonaddy.me/1619513845) or [Internet.nl](https://internet.nl/mail/anonaddy.me/520920/).

At this time it is not possible to enable MTA-STS on username subdomains since this would require a wildcard certificate of the format mta-sts.*.anonaddy.me.

### DNSSEC

DNS Secturity Extensions (DNSSEC) is employed, this protects the user from getting bad data from a signed zone by detecting the attack and preventing the user from receiving any tampered data.

DNSSEC adds two important security features to the DNS protocol:

* Data origin authentication (resolvers can cryptographically verify data came from the expected zone)
* Data integrity protection (resolvers can verify the data hasn't been modified in transit since it has been signed by the zone owner with the zone's private key)

### Perfect forward secrecy

PFS is a method of encryption that enables short-term, completely private key exchanges between clients and servers. It gives assurances that session keys will not be compromised even if the private key of the server is compromised. PFS is a large leap forwards in protecting data on the transport layer. Our server's and MTA's cipher suites are ordered to enable PFS. Check out the site on [SSL Labs](https://www.ssllabs.com/ssltest/analyze.html?d=anonaddy.me).

### SPF

Sender Policy Framework (SPF) is designed to tackle the issue of email forgery. SPF records allow domain owners to authorize which mail servers are permitted to send email on their behalf. Other cooperating mail servers can then check this SPF record upon receiving the email and act accordingly by either delivering it, marking it as spam or rejecting it.

### DKIM

DomainKeys Identified Mail (DKIM) is designed to allow senders to claim ownership of an email message and to identify any alterations to it along its journey.

It does this by digitally signing emails with a signature that receiving mail servers are able to verify by checking the sending domain's DKIM record e.g. (default._domainkey.example.com). Any alterations to the email message during transit will cause the DKIM-Signature: header verification check to fail.

### DMARC

Domain-based Message Authentication (DMARC) allows you to inform cooperating mail servers what they should do with your email message if both SPF and DKIM checks fail. You can tell the mail servers to do nothing, to quarantine (mark/send to spam) or to reject the email. AnonAddy informs other mail servers that they should reject any emails claiming to come from us if they fail both SPF and DKIM checks.

## The web application

Our site uses modern security features such as; HSTS (HTTP Strict Transport Security), a strict CSP (Content Security Policy), Subresource Integrity, no mixed content, DANE, Expect CT and XSS Protection.

<a href="https://internet.nl/" target="_blank" rel="nofollow noreferrer noopener" title="Internet.nl 100% badge">
    <img src="/assets/img/embed-badge-websitetest.svg" alt="Badge with text: 100% score in website test">
</a>

## The database server

All information you provide to us is stored on our secure servers in the Netherlands (UpCloud). Sensitive data in our database such as your recipient email addresses are encrypted using OpenSSL and the AES-256-CBC cipher. Furthermore, all encrypted values are signed with a message authentication code (MAC) to detect any modifications to the encrypted string.

### Login protection

I recommend that you use a long passphrase to protect your account, you can store this in a reputable password manager such as BitWarden. A minimum password length of 8 characters is required when creating an account.

Two Factor Authentication (2FA) is also available on our site and we encourage users to enable it. You can use any compatible app such as Aegis or andOTP (both available on F-droid). You can also use a hardware authentication device such as a YubiKey.
