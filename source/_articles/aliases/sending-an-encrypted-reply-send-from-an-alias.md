---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/view-all-aliases.png
section: content
title: Sending an encrypted reply/send from an alias
date: 2026-05-26
description: How to send or reply from an addy.io alias with encryption so the message is encrypted when it arrives at the addy.io server. Optional advanced feature for privacy.
helpCategories: [aliases]
advanced: true
highlightCode: true
order: 12
---

You can optionally **encrypt** replies and new sends from an alias so that the message is encrypted (e.g. with the addy.io public key or the public key of the destination address) before it is delivered. This is an advanced feature for users who want an extra layer of privacy. This article gives an overview of sending and replying with encryption enabled.

## When encryption is used

Encryption for a reply/send from an alias can happen in two ways:

1. When you have imported and encrypt your reply/send with the [no-reply@addy.io](https://keys.openpgp.org/search?q=26A987650243B28802524E2F809FD0D502E2F695) public key, (this will be automatically decrypted and forwarded on to the correct destination).
2. When you have imported and use the destination's public key, for example **hello@example.com**'s public key if sending to `alias+hello=example.com@addy.io` (this message will remain encrypted and pass through the addy.io mail servers and can only be decrypted by the receiver `hello@example.com`).

## Sending an encrypted reply

1. When [replying](/help/replying-to-email-using-an-alias/) to a forwarded email, use the normal reply flow.
2. If encryption is available, you may see an option to **Encrypt** or to use the addy.io public key (or the email you are sending to key). Enable it before sending.
3. Send the reply. The message will be encrypted so that only the intended recipient (or addy.io for automatic decryption, depending on setup) can read it.

## Sending a new encrypted email from an alias

1. When [sending from an alias](/help/sending-email-from-an-alias/) (new conversation), compose the message as usual.
2. If the option is offered, enable **Encrypt** or select the addy.io public key (or the recipient’s key) before sending.
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

If using FairEmail then follow the instructions at the bottom of [this article](/help/encrypting-a-reply-send-from-an-alias-with-the-addy-io-public-key-to-be-automatically-decrypted/) but import the PGP key of the destination address and select that instead.

For details on the addy.io public key and automatic decryption on the server, see [Encrypting a reply/send from an alias with the addy.io public key to be automatically decrypted](/help/encrypting-a-reply-send-from-an-alias-with-the-addy-io-public-key-to-be-automatically-decrypted/). For general reply/send without encryption, see [Replying to email using an alias](/help/replying-to-email-using-an-alias/) and [Sending email from an alias](/help/sending-email-from-an-alias/).
