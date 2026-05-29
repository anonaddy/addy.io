---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/send-from-alias-construction.jpg
section: content
title: Sending email from an alias
date: 2026-05-26
description: How to send a new email from an addy.io alias. Use the send-from address format or the Send from tool in the web app so recipients see your alias, not your real email.
helpCategories: [aliases]
order: 9
---

You can **send** a new email from an alias, not only [reply](/help/replying-to-email-using-an-alias/) to a forwarded message. That lets you start a conversation without receiving mail first. You compose the email in your usual email client, send it from a [verified recipient](/help/adding-a-recipient/), and put a special address in the **To** field so addy.io knows which alias to use and who should receive the message.

This article explains what you need before sending, how the address format works, how to use **Send from** in the web app, how to confirm a message was sent, and what to do if something goes wrong.

<h2 id="before-you-send">Before you send</h2>

Make sure the following are in place:

- **Verified recipient** - You must send the email from a [verified recipient](/help/adding-a-recipient/) address on your addy.io account. If you send from another address, the message will not be sent from your alias and will instead be forwarded back to you as if from an external sender.
- **Reply/send allowed** - That recipient must be allowed to [reply and send](/help/allowing-or-disallowing-a-recipient-to-reply-send-from-your-aliases/) from your aliases. This is enabled by default.
- **Alias exists (or can be created)** - The alias must already exist, or you must be able to create it when the message is sent (see [Standard vs shared-domain aliases](#standard-vs-shared-domain-aliases) below). If the alias has been [deactivated](/help/deactivating-email-aliases/) or [deleted](/help/deleting-an-alias/), sending will fail until you restore or reactivate it.

<h2 id="how-to-send-a-new-email">How to send a new email</h2>

1. Compose a **new** email in your email client or webmail (not a reply to a forwarded message).
2. Set **From** to your verified recipient address (the inbox you use with addy.io).
3. In the **To** field, enter the special send-from address for your alias and the person you are emailing (see [How the send address works](#how-the-send-address-works) below).
4. Write your subject and message, then send as usual.

addy.io receives the message, sends it from your alias, and delivers it to the recipient. They see your alias in the **From** field, not your recipient address.

<h2 id="how-the-send-address-works">How the send address works</h2>

The **To** address encodes which alias you are sending from and who should receive the email. It uses the same format as [replying](/help/replying-to-email-using-an-alias/).

For example, if your alias is **first@johndoe.anonaddy.com** and you want to email **hello@example.com**, enter this in the **To** field:

<span class="break-words"><first+hello=example.com@johndoe.anonaddy.com></span>

In this example:

- **first@johndoe.anonaddy.com** is the alias you are sending from
- **hello@example.com** is the person who will receive your message

addy.io decodes the address and delivers your email to **hello@example.com** from **first@johndoe.anonaddy.com**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/send-from-alias-construction.jpg" alt="Diagram showing how addy.io encodes the alias and recipient in a send-from address" title="How send-from-alias addressing works">
</div>

<h3 id="addresses-with-a-plus-extension">Addresses with a plus extension</h3>

If the destination address contains a plus extension (for example **hello+whatever@example.com**), include it in the encoded address:

<span class="break-words"><first+hello+whatever=example.com@johndoe.anonaddy.com></span>

<h3 id="standard-vs-shared-domain-aliases">Standard vs shared-domain aliases</h3>

| Alias type | Sending behaviour |
|------------|-------------------|
| **Standard** (e.g. `@johndoe.anonaddy.com`, [custom domains](/help/adding-a-custom-domain/)) | You can often send from an alias that does not exist yet if [catch-all](/help/terminology/#catch-all) is enabled for that username or domain. The alias is created when the first message is sent. |
| **Shared-domain** (e.g. `@anonaddy.me`) | You must [create the alias](/help/creating-new-email-aliases/) in advance. You cannot send from a shared-domain alias that has not been generated. |

This also applies to [additional usernames](/help/adding-an-additional-username/) and custom domains. See [What are the different kinds of aliases?](/help/what-are-the-different-kinds-of-aliases/) for more.

<h2 id="using-send-from-in-the-web-app">Using Send from in the web app</h2>

You do not have to build the address yourself. In the addy.io [dashboard](/help/navigating-the-web-application/), go to **Aliases**, click **Send from** next to an alias, enter the destination email address, and addy.io shows the correct **To** address to use in your email client.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/send-from-alias-modal.png" alt="Send from modal in addy.io showing the address to use in the To field" title="Send from modal">
</div>

You can use **Send from** to create a **standard** alias on the fly when catch-all is enabled, or when using a custom domain configured as catch-all. It does not create shared-domain aliases for you; those must exist before you send.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/send-from-alias.png" alt="Send from option next to an alias in the addy.io Aliases list" title="Send from in the Aliases list">
</div>

You can also get the correct address to send to in the browser extension or mobile app.

<h2 id="will-the-recipient-see-my-real-email">Will the recipient see my real email?</h2>

No. The message is sent from your alias; your verified recipient address is not shown to them. Avoid putting identifying details in the message body or signature (such as your real name or personal email) if you want to stay anonymous. See the [FAQ](/faq/#will-people-see-my-real-email-if-i-reply-to-a-forwarded-one) (the same applies to sends and replies).

<h2 id="check-that-your-email-was-sent">Check that your email was sent</h2>

In the addy.io dashboard, go to **Aliases** and find the alias you sent from. If the message was handled successfully, the **sent count** for that alias will increase.

If the count does not change, see [Having trouble sending?](#having-trouble-sending) below.

<h2 id="attachments-and-size-limits">Attachments and size limits</h2>

You can include attachments when sending from an alias. Attachments count towards your bandwidth. The maximum message size is **25 MB** including attachments. See the [FAQ](/faq/#can-emails-have-attachments) and [FAQ](/faq/#what-is-the-max-email-size-limit).

<h2 id="encrypted-sends">Encrypted sends</h2>

If you use GPG/OpenPGP, you can encrypt messages you send from an alias. See [Sending an encrypted reply/send from an alias](/help/sending-an-encrypted-reply-send-from-an-alias/) and [Encrypting a reply/send with the addy.io public key](/help/encrypting-a-reply-send-from-an-alias-with-the-addy-io-public-key-to-be-automatically-decrypted/). addy.io removes attached public keys and signatures from outbound messages so you do not accidentally expose your real identity.

<h2 id="having-trouble-sending">Having trouble sending?</h2>

The same issues can affect **sends** and **replies**. See [Having trouble replying?](/help/replying-to-email-using-an-alias/#having-trouble-replying) for full detail, or the summaries below.

<h3 id="the-message-comes-back-to-me-instead-of-the-recipient">The message comes back to me instead of the recipient</h3>

You are probably sending from an address that is **not** a verified recipient on your account. Check your email client's **Sent** folder and confirm which address it used. See the [FAQ](/faq/#im-trying-to-reply-send-from-an-alias-but-the-email-keeps-coming-back-to-me-whats-wrong).

<h3 id="the-message-is-rejected">The message is rejected</h3>

If you see `550 5.1.1 Recipient address rejected: Address does not exist`, the alias may have been [deleted](/help/deleting-an-alias/) or does not exist yet (and catch-all is not enabled). [Restore](/help/restoring-a-deleted-alias/) or [create](/help/creating-new-email-aliases/) the alias before sending.

If you receive **"Attempted reply/send from alias has failed"**, your **verified recipient's domain** may not pass DMARC checks. See the [FAQ](/faq/#im-trying-to-reply-send-from-an-alias-but-it-is-rejected-whats-wrong).

<h3 id="i-used-send-from-but-my-client-changed-the-to-address">I used Send from but my client changed the To address</h3>

Some email clients rewrite or "correct" unusual addresses. Paste the address from addy.io exactly into **To**, and check **Sent** to confirm what was actually used.

<h2 id="related-articles">Related articles</h2>

- [Replying to email using an alias](/help/replying-to-email-using-an-alias/) - reply to a forwarded message instead of starting a new one
- [Creating new email aliases](/help/creating-new-email-aliases/) - generate shared-domain aliases before sending
- [Understanding catch-all for a username](/help/understanding-catch-all-and-alias-auto-create-regex-for-a-username/) - allow on-the-fly alias creation when sending
- [Allowing or disallowing a recipient to reply/send](/help/allowing-or-disallowing-a-recipient-to-reply-send-from-your-aliases/)
- [Updating an alias display from name](/help/updating-an-alias-display-from-name/) - change the name recipients see when you send
