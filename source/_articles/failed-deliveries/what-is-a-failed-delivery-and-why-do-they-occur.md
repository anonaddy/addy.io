---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/failed-deliveries/failed-deliveries.png
section: content
title: What is a failed delivery and why do they occur?
date: 2026-05-27
description: What a failed delivery is on addy.io and why they happen. Email reached your alias but could not be delivered to your recipient; common causes and what to do.
helpCategories: [failed-deliveries]
order: 1
---

A **failed delivery** is any email event where addy.io cannot complete normal delivery-processing, either because forwarding to your [recipient](/help/adding-a-recipient/) fails (**outbound bounce**), an inbound message is rejected before acceptance (**inbound rejection**), or an inbound message is accepted but quarantined as spam (**inbound quarantined**). addy.io records these so you can review the reason, [view or download](/help/downloading-and-viewing-a-failed-delivery/) stored messages when available, and fix the issue-for example by updating a recipient address, freeing mailbox space, or resolving sender authentication problems. See [Terminology](/help/terminology/#failed-deliveries) for the short definition. This article explains each failed delivery type and common reasons they occur.

<h2 id="the-different-types-of-failed-deliveries">The different types of failed deliveries</h2>

There are **three different types** of failed deliveries on addy.io:

- **Outbound bounces** - These occur when addy.io attempts to forward an email but the destination mail server rejects it (e.g. recipient mailbox full).
- **Inbound rejections** - These occur when the addy.io mail servers reject inbound email from senders that fail basic security checks (e.g. the sender's email provider could not prove the message was genuine).
- **Inbound quarantined** - These are emails detected as spam by filtering software on the addy.io mail servers (e.g. blacklisted sending IP address, high spam score).

The failed deliveries page shows all three types and the reason each one failed.

**Outbound bounces** and **inbound quarantined** messages are temporarily stored if you have this setting enabled in your account.

**Inbound rejections** are not stored because they are never accepted by the addy.io mail servers.

<h2 id="common-causes-of-failed-deliveries">Common causes of failed deliveries</h2>

- **Recipient mailbox full** - The destination mailbox has exceeded its storage limit. The receiving server rejects the message. Free up space in that inbox or [change the alias’s recipient](/help/changing-the-recipients-for-an-alias/) to another address.
- **Invalid or typo’d recipient** - The [recipient](/help/adding-a-recipient/) address is wrong, was closed, or has a typo. Update the recipient in addy.io or add a new verified recipient and attach it to the alias.
- **Receiving server rejects the message** - The recipient’s mail server may reject mail (e.g. strict spam filtering, policy, or “mailbox unavailable”). You may see a bounce message or error code in the failed delivery details. Contact the recipient’s provider or use a different recipient if the problem persists.
- **Temporary failure** - Sometimes the receiving server is down or overloaded. You can try [resending](/help/resending-a-failed-delivery/) the failed delivery later.
- **High spam scoring inbound message** - If an inbound email has a high spam score or the sender is on a number of blacklists, then it will be quarantined.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/failed-deliveries/failed-deliveries.png" alt="Failed deliveries list in addy.io" title="Failed deliveries">
</div>

addy.io stores failed deliveries so you can inspect the error and the message. You can [download and view](/help/downloading-and-viewing-a-failed-delivery/) them, [resend](/help/resending-a-failed-delivery/) after fixing the issue, or [delete](/help/deleting-a-failed-delivery/) them from the list. To reduce future failures, see [How can I prevent or reduce failed deliveries?](/help/how-can-i-prevent-or-reduce-failed-deliveries/).
