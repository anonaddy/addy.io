---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/failed-deliveries/failed-deliveries.png
section: content
title: How can I prevent or reduce failed deliveries?
date: 2026-05-27
description: Tips to prevent or reduce failed deliveries on addy.io. Keep recipient addresses valid, avoid full mailboxes, adjust General settings, and check server and spam filters.
helpCategories: [failed-deliveries]
order: 4
---

[Failed deliveries](/help/what-is-a-failed-delivery-and-why-do-they-occur/) include three types: **outbound bounces** (forwarding to your [recipient](/help/adding-a-recipient/) fails), **inbound rejections** (messages are rejected before acceptance), and **inbound quarantined** (messages are accepted but quarantined as spam). You can reduce how often these happen by keeping recipient addresses valid, avoiding full mailboxes, and making sure senders and receiving servers pass security and spam checks. This article gives practical tips to prevent or reduce failed deliveries.

## Use valid, verified recipient addresses

- Add only real, working [recipient](/help/adding-a-recipient/) addresses and complete [verification](/help/adding-a-recipient/) so addy.io can forward to them.
- If you change your real email address, add the new address as a recipient, verify it, then [update your aliases](/help/changing-the-recipients-for-an-alias/) (or your [default recipient](/help/changing-the-default-recipient-on-your-account/)) so they forward to the new address. Remove or replace old addresses that no longer receive mail.

## Avoid full or over‑limit mailboxes

- Many failures are caused by the **recipient mailbox being full**. Check your inbox (and any “Sent” or “Archive” that counts toward the limit) and free up space or delete old mail. Consider using a provider with more storage or archiving mail elsewhere.
- If the recipient is a custom server or work address, ask the admin about quotas and retention.

## Check the receiving server and spam

- Some providers or work servers **reject** or **quarantine** forwarded mail. If you see failures to one recipient only, check that provider’s documentation or support for forwarding and allowlisting. Adding addy.io's sending details to an allowlist (if the provider supports it) can help.
- Check the **spam/junk** folder of your recipient address; occasionally the message is delivered but filtered. Mark as "not spam" if needed so future forwards are less likely to be filtered.

## Try these account settings

If mail reaches addy.io but your **recipient's provider** rejects or filters forwards (especially Google, iCloud, or Microsoft), try adjusting options in **Settings** - **General**. See [General settings](/help/general-settings/) for where to find them.

- **Update Display From Format** - Set this to **No name - just the alias** so the **From** header shows only your alias address. Some providers treat forwarded mail more strictly when the display name looks unusual or mismatched.
- **Use reply-to header for replying** - Enable this if your email client works better with a **Reply-To** header when you [reply from an alias](/help/replying-to-email-using-an-alias/).
- **Update Email Banner Location** - Set this to **Off** to stop adding the "This email was sent to…" banner on forwarded messages. Some providers scan banner text and may flag or reject the message; see the [FAQ](/faq/#im-not-receiving-any-emails-whats-wrong) for other tips.
- **PGP encryption** - [Enable encryption](/help/enabling-encryption-for-your-recipient/) for a recipient and add your public key so forwarded bodies (and optionally the subject) are encrypted before delivery. Your recipient's provider cannot scan encrypted content for "spam" keywords, which can reduce false rejections. You need a mail client that can decrypt messages with your private key.

These settings mainly help with **outbound bounces** and delivery problems at your recipient inbox. They do not fix **inbound rejections** or **inbound quarantined** mail, which must be resolved by the sender or their mail provider.

## Use the failed delivery details

- When a failure occurs, [view the failed delivery](/help/downloading-and-viewing-a-failed-delivery/) to see the **exact error** from the receiving server (e.g. "mailbox full", "user unknown"). That tells you whether to fix the address, free space, or contact the recipient's provider.

You cannot eliminate every failure (e.g. temporary outages or strict server policies), but keeping recipients valid and mailboxes under limit will prevent most. For more on what a failed delivery is and what to do with them, see [What is a failed delivery and why do they occur?](/help/what-is-a-failed-delivery-and-why-do-they-occur/).
