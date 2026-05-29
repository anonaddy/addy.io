---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/rules/rule-last-applied.png
section: content
title: Determining if a rule has been applied
date: 2026-05-27
description: How to tell whether an addy.io rule was applied to an email. Check the applied count to see the last applied date and time.
helpCategories: [rules]
order: 3
---

When a [rule](/help/terminology/#rules) runs, it can block an email, [disable encryption](/help/disabling-encryption-for-your-recipient/), or send the message to a different [recipient](/help/adding-a-recipient/). Multiple rules can match the same message, so more than one action may be applied. To see whether a rule was applied to a particular message, you can check the "last applied" time. This article explains how to determine if a rule has been applied.

## Check the Applied column

1. [Log in](https://app.addy.io) and go to **Rules** in the navigation bar.
2. Look at the **Applied** column, which shows how many times each rule has run.
3. Hover over the number to see when that rule was last applied (for example "an hour ago" or a specific date).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/rules/rule-last-applied.png" alt="Rule count showing last applied" title="Rule count showing last applied">
</div>

## Inferring from what happened to the email

- **Message was blocked** - If you expected the email but it never arrived at your [recipient](/help/adding-a-recipient/) and was not in your spam folder, a rule with a "block" action may have matched. Check your rules' conditions (sender, subject, alias) and [order](/help/changing-the-order-that-your-rules-are-applied-in/).
- **Message went to a different recipient** - If the email was forwarded to an address you did not expect, a rule with a "move to recipient" action may have matched.
- **Encryption was disabled** - If a message that you expected to be [encrypted](/help/enabling-encryption-for-your-recipient/) was not, a rule that disables encryption may have matched.

If you are unsure, temporarily [deactivating](/help/deactivating-a-rule/) a rule and sending a test email can help confirm whether that rule was responsible.
