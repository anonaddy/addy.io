---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/blocklist/add-blocklist-entry.png
section: content
title: Adding an entry to your blocklist
date: 2026-05-27
description: How to add senders or domains to your addy.io blocklist so they cannot send messages to your aliases.
helpCategories: [blocklist]
order: 1
---

The **blocklist** lets you block specific sender email addresses or entire sender domains so they cannot reach your [aliases](/help/what-are-the-different-kinds-of-aliases/). This is useful when you receive spam or repeated unwanted mail from the same source. This article explains how to add entries to your blocklist and when to block an email address vs a domain.

<h2 id="add-a-sender-to-your-blocklist">Add a sender to your blocklist</h2>

1. [Log in](https://app.addy.io) and go to **Blocklist** in the navigation sidebar.
2. In **Add to blocklist**, choose the **Type**:
   - **Email** to block one sender (e.g. `sender@example.com`)
   - **Domain** to block all senders at that domain (e.g. `example.com`)
3. Enter the value and click **Add to blocklist** (as shown by the red arrow below).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/blocklist/add-blocklist-entry.png" alt="Add blocklist entry in addy.io" title="Adding an entry to your blocklist">
</div>

<h2 id="bulk-add-up-to-50-entries">Bulk add up to 50 entries</h2>

If you need to block many senders quickly, you can add multiple entries at once:

1. Go to **Blocklist**.
2. Click **Bulk add**, a popup modal will appear. Select **Type** (**Email** or **Domain**).
3. Paste up to **50 entries** into the input, with one entry per line.
4. Click **Add to blocklist**.

Use this when importing a known list of spam senders or domains. If you need to add both emails and domains, submit them in separate batches using the matching type.

<h2 id="email-vs-domain-blocking">Email vs domain blocking</h2>

- **Block email** - Best when only one address is problematic.
- **Block domain** - Best when many different addresses at the same domain send unwanted mail.

Be careful with domain blocking: blocking a large domain (for example a major email provider) can block legitimate messages you still want.

<h2 id="adding-from-failed-deliveries">Adding from failed deliveries</h2>

On the [Failed Deliveries](/help/what-is-a-failed-delivery-and-why-do-they-occur/) page, you can often click **Add to blocklist** next to a sender. This is a quick way to block repeat offenders after a bounced, rejected, or quarantined message.

<h2 id="managing-entries">Managing entries</h2>

You can remove blocklist entries later from the **Blocklist** page if you change your mind. Removing an entry allows future emails from that sender or domain again.