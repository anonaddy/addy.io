---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/rules/create-new-rule.png
section: content
title: Creating a new rule
date: 2026-05-27
description: How to create a new rule on addy.io. Define conditions (sender, subject, alias) and actions (block, disable encryption, move to recipient) to automate incoming mail.
helpCategories: [rules]
order: 1
---

[Rules](/help/terminology/#rules) let you automate what happens to incoming mail. You define **conditions** (e.g. sender address, subject, which [alias](/help/what-are-the-different-kinds-of-aliases/) received the email) and **actions** (e.g. block the email, disable encryption, forward to a specific [recipient](/help/adding-a-recipient/)). When a message matches a rule's conditions, its actions are applied before the message is forwarded. This article explains how to create a new rule.

## Where to create a rule

1. [Log in](https://app.addy.io) and go to **Rules** in the navigation bar.
2. Click **Create rule** as shown in the red box below.
3. Give the rule a name (e.g. "Block newsletter senders") so you can recognise it later.

## Setting conditions

Choose when the rule should run. Typical options include:

- **Sender** - Email address or domain of the sender (e.g. block mail from a specific address or `*@spammer.com`). You can also use your [blocklist](/help/adding-an-entry-to-your-blocklist/) for persistent blocks.
- **Subject** - Words or patterns in the subject line.
- **Alias** - Which alias received the email (e.g. only apply this rule to mail sent to shop@yourdomain.com).

You can combine conditions (e.g. sender contains "newsletter" **and**/**or** alias is "news@johndoe.anonaddy.com"). Add the conditions that match your use case.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/rules/create-new-rule.png" alt="Rule conditions in addy.io" title="Setting rule conditions">
</div>

## Setting actions

Choose what happens when an email matches the conditions. Common actions include:

- **Block** - Discard the email (sender is not notified).
- **Disable encryption** - Forward without [encryption](/help/enabling-encryption-for-your-recipient/) for this message.
- **Move to recipient** - Send to a specific recipient instead of the alias’s default.

Add one or more actions, then save the rule. The rule will be applied to incoming mail in the [order](/help/changing-the-order-that-your-rules-are-applied-in/) you have set. You can [deactivate](/help/deactivating-a-rule/) or [delete](/help/deleting-a-rule/) it later if needed.
