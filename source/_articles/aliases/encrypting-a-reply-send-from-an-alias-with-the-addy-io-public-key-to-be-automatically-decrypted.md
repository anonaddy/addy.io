---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/view-all-aliases.png
section: content
title: Encrypting a reply/send from an alias with the addy.io public key to be automatically decrypted
date: 2026-05-27
description: Use the addy.io public key to encrypt replies and new sends from an alias so they are decrypted automatically on the mail server. Advanced encryption option for addy.io users.
helpCategories: [aliases]
advanced: true
highlightCode: true
order: 13
---

You can encrypt a [reply](/help/replying-to-email-using-an-alias/) or a [new send](/help/sending-email-from-an-alias/) from an alias using the **addy.io public key**. The message is encrypted before it arrives at addy.io and is **automatically decrypted** on the addy.io mail server before being forwarded on to the correct destination. This gives an extra layer of privacy for the message content. This article describes the idea and how to use this option; exact steps may depend on your mail client.

## How it works

- addy.io provides a **public key** ([available here](https://keys.openpgp.org/search?q=26A987650243B28802524E2F809FD0D502E2F695)) that you (or your mail client) use to encrypt the reply/send.
- The message is sent **encrypted** to the addy.io mail server and is then automatically decrypted.
- After being **automatically decrypted**, the message is forwarded on to the correct destination so they receive a normal, readable email. This protects the content in transit from your real email provider to the addy.io mail server.

This is an **advanced** feature that is useful if you wish to hide the contents of your reply/send from your email provider such as Gmail. You need a mail client or workflow that can encrypt with the addy.io public key such as Mozilla Thunderbird.

## Using the addy.io public key to encrypt

1. When [sending from an alias](/help/sending-email-from-an-alias/) (new conversation) or replying, compose the message as usual.
2. If the option is offered, enable **Encrypt** or select the addy.io public key before sending.
3. Send the email. It will be encrypted according to the method you chose.

Your email client may complain that the public key does not match the identity of the email address you are encrypting to.

If you are using Mozilla Thunderbird then you will need to use their pgp alias rules configuration - [https://support.mozilla.org/en-US/kb/openpgp-recipient-alias-configuration](https://support.mozilla.org/en-US/kb/openpgp-recipient-alias-configuration), this is because by default they do not allow you to encrypt an email using a public key that does not match the receiver's identity.

Here's an example config that you can use for your `openpgp_alias_to_keys.json`:

```json
{
  "description": "Thunderbird OpenPGP Alias Rules",
  "rules": [
    {
      "domain": "anonaddy.me",
      "keys": [
        {
          "description": "Testing decrypt replies/sends on addy.io",
          "fingerprint": "26A987650243B28802524E2F809FD0D502E2F695"
        }
      ]
    }
  ]
}
```

This will allow you to encrypt all messages sent to aliases `*@anonaddy.me` using the `no-reply@addy.io` public key. Add or modify the alias domains as required.

## Encrypting a reply/send using FairEmail (Android)

[FairEmail](https://email.faircode.eu/) on Android uses **OpenKeychain** for PGP. Import the addy.io public key once, then encrypt each [reply](/help/replying-to-email-using-an-alias/) or [new send](/help/sending-email-from-an-alias/) before it leaves your device.

You need **FairEmail**, **OpenKeychain**, and OpenKeychain set as the encryption provider in FairEmail. If the padlock never appears when composing, check FairEmail **Settings** > **Encryption** first.

### Import the addy.io public key (one-time)

1. In FairEmail, open **Settings** (gear icon) > **Encryption**.
2. In the **PGP** section, tap **Import key +**.

<div class="flex justify-center my-8">
  <img class="shadow w-[500px] max-w-full h-auto" src="/assets/img/help/aliases/fairemail-encryption-settings.png" alt="FairEmail encryption settings with Import key option" title="FairEmail encryption settings">
</div>

3. Search for **`no-reply@addy.io`** (or paste the [addy.io public key fingerprint](https://keys.openpgp.org/search?q=26A987650243B28802524E2F809FD0D502E2F695): `26A987650243B28802524E2F809FD0D502E2F695`).
4. Select the key and tap **IMPORT** in OpenKeychain.

<div class="flex justify-center my-8">
  <img class="shadow w-[500px] max-w-full h-auto" src="/assets/img/help/aliases/fairemail-openkeychain-import-addy-public-key.png" alt="OpenKeychain import screen for no-reply@addy.io" title="Importing the addy.io public key in OpenKeychain">
</div>

You only need to do this once per device.

### Encrypt and send a reply or new message

1. Compose your message as usual. For a reply, use the address addy.io gave you in the forwarded email. For a new send, use the send-from address from [Sending email from an alias](/help/sending-email-from-an-alias/).
2. Check that the **green padlock** is visible on the compose screen. If it is grey or missing, PGP is not available. Check that OpenKeychain is installed and enabled in FairEmail encryption settings.
3. Tap **Encrypt** (bottom right).

<div class="flex justify-center my-8">
  <img class="shadow w-[500px] max-w-full h-auto" src="/assets/img/help/aliases/fairemail-encrypting-a-reply-or-send-with-addy-public-key.png" alt="FairEmail compose screen with green padlock and Encrypt button" title="Encrypting a reply or send in FairEmail">
</div>

4. When OpenKeychain asks you to choose a key, pick the entry for **`no-reply@addy.io`**. The list may also show **`mailer@anonaddy.me`** (or similar). That is another **identity on the same key**, not a different key. Either identity works as long as the fingerprint matches addy.io's public key.
5. Set the mode to **PGP encrypt-only**, then tap **SEND**.

<div class="flex justify-center my-8">
  <img class="shadow w-[500px] max-w-full h-auto" src="/assets/img/help/aliases/fairemail-openkeychain-key-selection.png" alt="OpenKeychain key selection for no-reply@addy.io" title="Selecting the addy.io PGP key in OpenKeychain">
</div>

<div class="flex justify-center my-8">
  <img class="shadow w-[500px] max-w-full h-auto" src="/assets/img/help/aliases/fairemail-sending-an-encrypted-reply-or-send-with-addy-public-key.png" alt="FairEmail send options with PGP encrypt-only selected" title="Sending an encrypted message with PGP encrypt-only">
</div>

FairEmail may warn that the public key does not match the **To** address on the message (for example your alias or encoded reply address). That is expected. Use the **`no-reply@addy.io`** key anyway, the same idea as Thunderbird's [OpenPGP alias rules](https://support.mozilla.org/en-US/kb/openpgp-recipient-alias-configuration) above.

For a general overview of encrypted reply/send, see [Sending an encrypted reply/send from an alias](/help/sending-an-encrypted-reply-send-from-an-alias/).
