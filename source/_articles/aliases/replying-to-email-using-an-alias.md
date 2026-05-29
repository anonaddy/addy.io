---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/send-from-alias-construction.jpg
section: content
title: Replying to email using an alias
date: 2026-05-26
description: How to reply to forwarded emails using your addy.io alias so the recipient sees your alias address, not your real email. Check replies in the dashboard and fix common issues.
helpCategories: [aliases]
order: 8
---

When addy.io forwards an email to you, the message is set up so you can **reply** and the original sender will see your **alias** address, not your real email. In most cases you simply click **Reply** in your email client; the correct address is already in the message. This article explains how that works, what you need before replying, how to confirm a reply was sent, and what to do if something goes wrong.

To start a **new** conversation (without replying to a forwarded message), see [Sending email from an alias](/help/sending-email-from-an-alias/) instead.

## Before you reply

Make sure the following are in place:

- **Verified recipient** - You must send the reply from a [verified recipient](/help/adding-a-recipient/) address on your addy.io account (the inbox that received the forwarded email). If you send from another address, the message will not be sent from your alias and will instead be forwarded back to you as if from an external sender.
- **Reply/send allowed** - That recipient must be allowed to [reply and send](/help/allowing-or-disallowing-a-recipient-to-reply-send-from-your-aliases/) from your aliases. This is enabled by default.
- **Active alias** - The alias must exist and be active. If it has been [deactivated](/help/deactivating-email-aliases/) or [deleted](/help/deleting-an-alias/), replies will fail until you restore or reactivate it.

## How to reply

1. Open the forwarded email in your email client or webmail (Gmail, Outlook, Apple Mail, etc.).
2. Click **Reply** (or **Reply all** if you need to include other recipients).
3. Your client should fill the **To** field with a special address (see below). Do not change it to the sender's normal email address unless you intend to contact them directly and reveal your real address.
4. Write and send your message as usual.

addy.io receives your reply, sends it from your alias, and delivers it to the original sender. They see your alias in the **From** field, not your recipient address.

## How the reply address works

Each forwarded email has a **From** header that encodes who sent the original message and which alias received it. It looks like this:

From: <span class="break-words"><alias+contact=company.com@username.anonaddy.com></span>

In this example:

- **contact@company.com** is the person who emailed you
- **alias@username.anonaddy.com** is the alias that forwarded the message to you

When you click **Reply**, your email client uses that address as the recipient. addy.io decodes it and delivers your reply to **contact@company.com** from **alias@username.anonaddy.com**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/send-from-alias-construction.jpg" alt="Diagram showing how addy.io encodes the sender and alias in a reply address" title="How reply-from-alias addressing works">
</div>

This works the same way for [standard, shared-domain, and custom-domain aliases](/help/what-are-the-different-kinds-of-aliases/), additional usernames, and addresses with plus extensions (e.g. **hello+tag@example.com**).

## Will the recipient see my real email?

No. The message is sent from your alias; your verified recipient address is not shown to them. Avoid putting identifying details in the message body or signature (such as your real name or personal email) if you want to stay anonymous. See also the [FAQ](/faq/#will-people-see-my-real-email-if-i-reply-to-a-forwarded-one).

## Check that your reply was sent

In the addy.io [dashboard](/help/navigating-the-web-application/), go to **Aliases** and find the alias you replied from. If the reply was handled successfully, the **reply count** for that alias will increase.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/help-replying.png" alt="Alias list in the addy.io dashboard showing the reply count column" title="Reply count in the dashboard">
</div>

If the count does not change, see [Having trouble replying?](#having-trouble-replying) below.

## Forwarded email banner

Forwarded messages include a banner (for example, "This email was sent to…"). addy.io **removes this banner automatically** when you reply, so the recipient does not see it. Do not edit the banner text in the quoted part of your reply, as that can prevent it from being stripped correctly. You can remove it manually from the quoted text if you prefer.

## Encrypted replies

If you use GPG/OpenPGP, you can encrypt replies. See [Sending an encrypted reply/send from an alias](/help/sending-an-encrypted-reply-send-from-an-alias/) and [Encrypting a reply/send with the addy.io public key](/help/encrypting-a-reply-send-from-an-alias-with-the-addy-io-public-key-to-be-automatically-decrypted/). addy.io also removes attached public keys and signatures from replies so you do not accidentally expose your real identity.

## Having trouble replying?

### The reply comes back to me instead of the other person

You are probably sending from an address that is **not** a verified recipient on your account. addy.io treats the message like any other incoming mail and forwards it to you again.

Check your email client's **Sent** folder and confirm which address it used. It must match a verified recipient on addy.io. See the [FAQ](/faq/#im-trying-to-reply-send-from-an-alias-but-the-email-keeps-coming-back-to-me-whats-wrong).

### The reply is rejected

If you see `550 5.1.1 Recipient address rejected: Address does not exist`, the alias may have been [deleted](/help/deleting-an-alias/) or does not exist yet (and catch-all is not enabled). [Restore](/help/restoring-a-deleted-alias/) or create the alias before replying.

If you receive an email with the subject **"Attempted reply/send from alias has failed"**, your **verified recipient's domain** may not pass DMARC checks (this refers to your recipient address on addy.io, not your custom alias domain or the person you are emailing). Popular providers (Gmail, Outlook, Proton Mail, etc.) usually already have DMARC in place. See the [FAQ](/faq/#im-trying-to-reply-send-from-an-alias-but-it-is-rejected-whats-wrong) for details.

### Red "may have been spoofed" banner on the forwarded email

addy.io adds this when an incoming message fails authentication checks (often misconfigured SPF/DMARC on the sender's side). You can usually still reply safely; check the **X-AnonAddy-Authentication-Results** header if you want to see why the warning was added. See the [FAQ](/faq/#ive-been-forwarded-an-email-with-a-red-warning-banner-saying-it-may-have-been-spoofed-what-does-it-mean).

## Related articles

- [Sending email from an alias](/help/sending-email-from-an-alias/) - start a new email without replying first
- [Allowing or disallowing a recipient to reply/send](/help/allowing-or-disallowing-a-recipient-to-reply-send-from-your-aliases/)
- [Updating an alias display from name](/help/updating-an-alias-display-from-name/) - change the name recipients see when you reply
