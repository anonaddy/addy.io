---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/recipients/adding-a-recipient.png
section: content
title: Adding a recipient
date: 2026-05-28
description: How to add and verify a new email recipient on addy.io. Recipients are the real email addresses where your aliases forward mail; you must verify each one before use.
helpCategories: [recipients]
order: 1
---

[Recipients](/help/terminology/#recipients) are the real email addresses where your [aliases](/help/what-are-the-different-kinds-of-aliases/) forward mail. You must add and verify each recipient before you can use it. This article explains how to add a recipient and what to do if verification email does not arrive.

For privacy, consider a dedicated inbox at a privacy-focused provider (e.g. Proton Mail or Tuta).

<h2 id="how-to-add-a-recipient">How to add a recipient</h2>

1. [Log in](https://app.addy.io) and go to **Recipients** in the navigation bar.
2. Click **Add Recipient**.
3. Enter the email address you want to add (e.g. `johndoe@example.com`) and submit.
4. Open that inbox and click the **verification link** in the email from addy.io. The recipient shows as verified in the **Verified** column.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/recipients/adding-a-recipient.png" alt="Add a new recipient in addy.io" title="Adding a recipient">
</div>

<h2 id="if-you-do-not-receive-the-verification-email">If you do not receive the verification email</h2>

- Check your **spam** or junk folder.
- On the **Recipients** page, click **Resend email** in the **Verified** column for that address.

Some unfamiliar recipient domains need a **second verification step**: reply to the first notification email from addy.io. You will then receive a second email with the verification link.

Recipient email addresses are stored encrypted in addy.io's database.
