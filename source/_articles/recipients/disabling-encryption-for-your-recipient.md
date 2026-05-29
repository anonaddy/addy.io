---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/recipients/disable-encryption-toggle.png
section: content
title: Disabling encryption for your recipient
date: 2026-05-27
description: How to turn off or remove PGP encryption for an addy.io recipient. Temporarily disable encryption or delete the stored public key.
helpCategories: [recipients]
order: 5
---

If you have [enabled encryption](/help/enabling-encryption-for-your-recipient/) for a recipient, you can turn it off so that forwarded emails are sent in plain text again, or remove the stored public key. You might do this if you no longer use PGP for that inbox, if you lost the private key, or if you are troubleshooting delivery. This article explains how to temporarily disable encryption or delete the PGP key.

## Toggle off to temporarily disable

1. [Log in](https://app.addy.io) and go to **Recipients** in the navigation bar.
2. Find the recipient in the table and turn the switch in the encryption column to **OFF** (as shown in the red box below).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/recipients/disable-encryption-toggle.png" alt="Toggle off encryption for a recipient in addy.io" title="Temporarily disabling encryption">
</div>

Use this when you want to stop encrypting for a while but keep the key on file (e.g. for a new client that does not support PGP yet).

## Delete the PGP key

To **permanently** stop using encryption for this recipient and remove the key from addy.io:

1. [Log in](https://app.addy.io) and go to **Recipients** in the navigation bar.
2. Find the recipient in the table and click the small cross icon in the encryption column (as indicated by the red arrow below).
3. Confirm and click **Remove public key** in the popup modal. addy.io will no longer encrypt mail to this recipient, and the public key is removed. To use encryption again, you must [add your public key again](/help/enabling-encryption-for-your-recipient/).

Delete the key if you no longer use that key pair, if you have lost the private key, or if you want to replace it with a new key (add the new public key after removing the old one).
