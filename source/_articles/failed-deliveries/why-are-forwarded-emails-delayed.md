---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/failed-deliveries/failed-deliveries.png
section: content
title: Why are forwarded emails delayed?
date: 2026-06-04
description: Why your email provider sometimes delays addy.io forwards while your dashboard already shows them as forwarded. Covers temporary 421 4.7.28 SPF rate limits and what you can do.
helpCategories: [failed-deliveries]
order: 6
---

Some users notice that forwarded mail can take **minutes or hours** to appear in their inbox, even though the addy.io dashboard already shows the alias as having **forwarded** the message. Delivery is often instant at other times. This article explains why that happens and what you can do.

<h2 id="why-the-dashboard-can-show-forwarded-before-gmail-delivers">Why the dashboard can show "forwarded" before it is delivered</h2>

When an email reaches your alias, addy.io accepts it, processes it, and attempts to deliver it to your [recipient](/help/adding-a-recipient/) address (for example `@gmail.com`).

The dashboard counts a forward once addy.io has **completed its delivery attempt** to your email provider's mail servers. If they accept the message into their queue, or return a **temporary** response asking the sending server to try again later, addy.io has already done its part. Your email provider may still hold the message internally before it appears in your inbox.

So **"forwarded" on addy.io does not always mean "already in your recipient inbox"** - it means the message was handed off for delivery to them.

<h2 id="gmail-temporary-rate-limits-421-4-7-28">Gmail temporary rate limits (421 4.7.28)</h2>

A common cause of long delays is a **temporary rate limit** from Gmail. In mail server logs this often appears as status **deferred** with an error similar to:

> 421 4.7.28 Gmail has detected an unusual rate of mail originating from your SPF domain [...]. Mail sent from your domain has been temporarily rate limited.

The **SPF domain** in that message is usually your addy.io username subdomain (for example `johndoe.anonaddy.com`), not your personal `@gmail.com` address. Gmail is limiting how much mail it will accept in a short period from that sending domain. This is a **temporary** restriction (response code **421**), not a permanent rejection.

addy.io's servers **retry** deferred messages automatically. Gmail typically accepts them once the rate limit eases, which is why some forwards arrive **hours later** while others are **instant** when volume is lower.

This is different from a [failed delivery](/help/what-is-a-failed-delivery-and-why-do-they-occur/) where forwarding ultimately **bounces** and is recorded on your **Failed Deliveries** page. A deferred message may never appear there if delivery eventually succeeds.

Google documents this type of limit here: [Bulk Email Senders Guidelines / Unsolicited rate limit](https://support.google.com/mail/?p=UnsolicitedRateLimitError).

<h2 id="why-gmail-does-this">Why Gmail does this</h2>

Gmail applies rate limits to protect users from spam. Forwarding services send many messages from shared infrastructure and authenticated domains such as `username.anonaddy.com`, which can look like bulk mail to automated filters even when each message is legitimate.

Delays are more likely when:

- A large number of messages are forwarded to the same Gmail inbox in a short time
- Many different senders forward to the same Gmail account via aliases
- Gmail has recently flagged similar mail as unwanted

This is usually **not** caused by a misconfiguration on your Gmail account alone.

<h2 id="what-you-can-do">What you can do</h2>

- **Wait** - Temporary limits often clear on their own; retries usually succeed without any action from you.
- **Check spam** - Delayed mail can still land in **Spam** when it arrives. Mark legitimate forwards as **Not spam** so Gmail learns they are wanted.
- **Add trusted senders** - Add `no-reply@addy.io` and important alias addresses to your Google Contacts or safe senders where possible.
- **Reduce sudden bursts** - If you forward very high volumes to one Gmail inbox, spreading traffic or using another verified recipient can help.
- **Adjust forwarding settings** - Steps that can help Gmail accept forwards more reliably (banner, From format, encryption) are in [How can I prevent or reduce failed deliveries?](/help/how-can-i-prevent-or-reduce-failed-deliveries/) and the [FAQ](/faq/#im-not-receiving-any-emails-whats-wrong).

If mail **never** arrives and you see a **failed delivery** in the dashboard, use [Downloading and viewing a failed delivery](/help/downloading-and-viewing-a-failed-delivery/) to read the exact error from Gmail.

<h2 id="when-to-contact-support">When to contact support</h2>

Contact [addy.io support](/contact/) if:

- Delays persist for **more than 24 hours** on multiple messages
- Gmail eventually returns a **permanent** bounce (5xx) and a failed delivery is recorded
- Only your account is affected and you have already tried the steps above

Include the approximate time the message was sent to your alias and your Gmail recipient address so the delivery logs can be checked.
