---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/failed-deliveries/failed-deliveries.png
section: content
title: What is a failed delivery and why do they occur?
date: 2026-06-02
description: What a failed delivery is on addy.io and why they happen. Email reached your alias but could not be delivered to your recipient; common causes and what to do.
helpCategories: [failed-deliveries]
order: 1
---

A **failed delivery** is any email event where addy.io cannot complete normal delivery processing, either because forwarding to your [recipient](/help/adding-a-recipient/) fails (**outbound bounce**), an inbound message is rejected before acceptance (**inbound rejection**), or an inbound message is accepted but quarantined as spam (**inbound quarantined**). addy.io records these so you can review the reason, [view or download](/help/downloading-and-viewing-a-failed-delivery/) stored messages when available, and fix the issue - for example by updating a recipient address, freeing mailbox space, or resolving sender authentication problems. See [Terminology](/help/terminology/#failed-deliveries) for the short definition. This article explains each failed delivery type and common reasons they occur.

<h2 id="the-different-types-of-failed-deliveries">The different types of failed deliveries</h2>

There are **three different types** of failed deliveries on addy.io:

- **Outbound bounces** - These occur when addy.io attempts to forward an email but the destination mail server rejects it (e.g. recipient mailbox full).
- **Inbound rejections** - These occur when the addy.io mail servers reject inbound email from senders that fail basic security checks (e.g. the sender's email provider could not prove the message was genuine).
- **Inbound quarantined** - These are emails detected as spam by filtering software on the addy.io mail servers (e.g. blacklisted sending IP address, high spam score).

The failed deliveries page shows all three types and the reason each one failed.

**Outbound bounces** and **inbound quarantined** messages are temporarily stored if you have this setting enabled in your account.

**Inbound rejections** are not stored because they are never accepted by the addy.io mail servers.

<h2 id="common-causes-by-failed-delivery-type">Common causes by failed delivery type</h2>

<h3 id="outbound-bounces-common-causes">Outbound bounces - common causes</h3>

These happen after addy.io has accepted inbound mail and then tries to forward it to your recipient inbox (or a destination inbox when you send/reply from an alias).

- **Recipient mailbox full** - The destination mailbox has exceeded its storage limit, so the destination server rejects the forward.
- **Recipient address invalid** - The recipient address on your account is incorrect, no longer exists, or has a typo.
- **Recipient server policy rejection** - The destination provider may apply local policies (content, attachment type, rate limits, temporary blocks, or strict filtering) and reject the message.
- **Temporary server issue** - The destination provider may be temporarily unavailable or overloaded, causing a temporary bounce.

What to do:

- Confirm your recipient address is correct and still active.
- Free up space in the recipient inbox if it is full.
- Try [resending](/help/resending-a-failed-delivery/) later for temporary failures.
- If one recipient keeps rejecting, [change the alias recipient](/help/changing-the-recipients-for-an-alias/) or add another verified recipient.

<h3 id="inbound-rejections-common-causes">Inbound rejections - common causes</h3>

These happen before addy.io accepts the message. The sender's server or domain fails basic checks, so the message is rejected during SMTP.

Below are common inbound rejection examples and what they usually mean:

- **`554 5.5.2 Helo command rejected: need fully-qualified hostname`** - The sending server introduced itself in SMTP HELO/EHLO with an invalid name (for example `localhost`, a short host name, or a non-FQDN value). Receiving servers expect a fully-qualified host name such as `mail.example.com`.
- **`554 5.7.1 Helo command rejected: Host not found`** - The host name given in HELO/EHLO does not resolve in DNS (A/AAAA record missing or broken). The sending server claims a host identity that cannot be looked up.
- **`554 5.7.1 Client host rejected: cannot find your reverse hostname`** - The sending IP has no valid reverse DNS (PTR) record, or the PTR is misconfigured. Many mail servers require reverse DNS to reduce spam and bot traffic.
- **`554 5.1.8 Sender address rejected: Domain not found`** - The sender envelope domain (MAIL FROM / return-path domain) does not exist in DNS (no valid MX or A record, or typo/non-existent domain), so it cannot receive bounces and fails basic legitimacy checks.

Why these are rejected:

- They are common signs of misconfigured or low-quality mail infrastructure.
- Correct DNS and SMTP identity checks help block spoofed, abusive, or non-deliverable mail before acceptance.
- If addy.io accepted this mail, downstream forwarding failures and abuse risk would increase.

Who can fix this:

- These are sender-side issues. The sender's mail provider or server administrator must fix hostnames and DNS records.
- As an addy.io user, you cannot correct these from your account settings.

<h3 id="inbound-quarantined-common-causes">Inbound quarantined - common causes</h3>

These messages are accepted by addy.io but classified as spam by filtering and placed in quarantine.

- **High spam score** - Message content, headers, links, or sending patterns score as likely spam.
- **Sender listed on blocklists** - The sending IP or domain appears on one or more reputation blocklists.
- **Authentication failures** - SPF, DKIM, or DMARC checks fail or look suspicious in context.
- **Reputation or policy signals** - Sender behaviour matches known abuse patterns (bulk signups, phishing-like content, malicious links, or poor sending reputation).

What to do:

- Review the failed delivery details to identify the rejection or filtering reason.
- For legitimate senders, ask them to verify SPF, DKIM, DMARC, PTR, and HELO/EHLO setup on their mail server.
- Do not whitelist obviously abusive senders. If needed, report abuse using [Report abuse](/help/report-abuse/).
- Quarantined messages cannot be resent or released to protect addy.io mail-server reputation. See [Why can't I resend or release a quarantined message?](/help/resending-a-failed-delivery/#why-cant-i-resend-or-release-a-quarantined-message).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/failed-deliveries/failed-deliveries.png" alt="Failed deliveries list in addy.io" title="Failed deliveries">
</div>

addy.io stores failed deliveries so you can inspect the error and the message. You can [download and view](/help/downloading-and-viewing-a-failed-delivery/) them, [resend](/help/resending-a-failed-delivery/) after fixing the issue, or [delete](/help/deleting-a-failed-delivery/) them from the list. To reduce future failures, see [How can I prevent or reduce failed deliveries?](/help/how-can-i-prevent-or-reduce-failed-deliveries/).
