---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help-add-recipient.png
section: content
title: Adding a recipient
date: 2020-03-03
description: This article guides you through the steps to add a new email recipient on addy.io. This is a real email address where emails can be forwarded to.
helpCategories: [recipients]
---

This article guides you through the steps to add a new email recipient on addy.io. This is a real email address where emails can be forwarded to.

## Choosing an email for the recipient

In an ideal world your recipient email address will be a fresh account at a privacy focused service such as ProtonMail or Tutanota. This would mean that the address had not been previously given out so should not be receiving any spam emails.

You can of course use any existing email address that you like. When you click "Add Recipient" a modal will appear. Enter the email that you would like to add e.g. johndoe@example.com

You will receive a verification link via email that you must click before you can start using the recipient.

<div class="flex justify-center mb-6">
  <img class="shadow" src="/assets/img/help-add-recipient.png" alt="Add new recipient" title="Add new recipient">
</div>

If you do not receive the verification email, please check your spam folder, you can also resend the email by clicking "Resend email" in the column named "Verified".

Recipient email addresses in the database are encrypted using OpenSSL and the AES-256-CBC cipher. Furthermore, all encrypted values are signed with a message authentication code (MAC) to detect any modifications to the encrypted string.