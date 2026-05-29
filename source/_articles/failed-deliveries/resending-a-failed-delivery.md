---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/failed-deliveries/resend-failed-delivery.png
section: content
title: Resending a failed delivery
date: 2026-05-27
description: How to resend a failed delivery on addy.io. After fixing the recipient or mailbox, resend the stored message so it reaches your inbox.
helpCategories: [failed-deliveries]
order: 3
---

When a message to one of your [aliases](/help/what-are-the-different-kinds-of-aliases/) could not be delivered to your [recipient](/help/adding-a-recipient/), addy.io records it as a [failed delivery](/help/what-is-a-failed-delivery-and-why-do-they-occur/). Some failed deliveries can be resent after you fix the issue. In practice, resend is available for **stored outbound forward** failures (not inbound rejections, and not quarantined entries). This article explains how resend works.

## Before you resend

- **Fix the underlying issue** - Resending will fail again if the recipient is still invalid, the mailbox is still full, or the receiving server is still rejecting mail. Update the [recipient](/help/changing-the-recipients-for-an-alias/) or destination mailbox as needed, then resend.
- **Check the failed delivery** - [View or download](/help/downloading-and-viewing-a-failed-delivery/) the failed delivery to confirm the error and that you have addressed it.

Failed deliveries can only be resent once.

## How to resend a failed delivery

1. [Log in](https://app.addy.io) and go to **Failed Deliveries** in the navigation bar.
2. Find a failed delivery entry with a **Resend** action (as shown in the red box below).
3. Click **Resend**. You can resend to the alias's original recipient(s), or choose up to 10 verified recipients in the resend dialog.
4. If it succeeds, the entry is marked as resent. If it fails again, a new failed-delivery entry will appear and you will see the error code.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/failed-deliveries/resend-failed-delivery.png" alt="Resend failed delivery in addy.io" title="Resending a failed delivery">
</div>

## Why can't I resend or release a quarantined message?

Quarantined messages are usually classified as spam because the sender's IP address or domain appears on one or more blocklists (including Spamhaus), or because the message failed DMARC authentication checks.

The sender must resolve those issues before future messages can be forwarded successfully.

To protect the sending reputation of addy.io mail servers, quarantined messages cannot be released or forwarded to recipients. If quarantined spam were forwarded, addy.io servers could also be placed on blocklists, which would affect email delivery for all users.

You can [delete](/help/deleting-a-failed-delivery/) a failed delivery from the list if you do not want to resend it. To reduce future failures, see [How can I prevent or reduce failed deliveries?](/help/how-can-i-prevent-or-reduce-failed-deliveries/).
