---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/failed-deliveries/download-failed-delivery.png
section: content
title: Downloading and viewing a failed delivery
date: 2026-05-28
description: How to view and download a failed delivery on addy.io. See the bounce details, error message and original message so you can fix the issue and resend.
helpCategories: [failed-deliveries]
order: 2
---

When addy.io records a [failed delivery](/help/what-is-a-failed-delivery-and-why-do-they-occur/), you can open it in your account to see why it failed and, in many cases, download the stored message. Not every failure is stored (for example, **inbound rejections** are not). This article explains how to find, inspect, and download failed deliveries.

<h2 id="where-to-find-failed-deliveries">Where to find failed deliveries</h2>

1. [Log in](https://app.addy.io) and go to **Failed Deliveries** in the navigation bar.
2. Review the list. Each entry shows the date, [alias](/help/what-are-the-different-kinds-of-aliases/), recipient, failure type, and a short error reason.

<h2 id="download-a-failed-delivery">Download a failed delivery</h2>

1. Find the entry you want to inspect.
2. Click **Download** (as shown below) to save the raw message or report as an `.eml` file.
3. If the entry is **inbound quarantined**, read any warning carefully before opening the file. The message may contain malicious links or attachments.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/failed-deliveries/download-failed-delivery.png" alt="Download a failed delivery in addy.io" title="Downloading and viewing a failed delivery">
</div>

If you cannot download **inbound quarantined** or **outbound bounce** entries, enable **Store Failed Deliveries** under **Settings** > **General** at [app.addy.io/settings](https://app.addy.io/settings).

After you fix the underlying issue (for example an invalid [recipient](/help/adding-a-recipient/) or full mailbox), you can [resend the failed delivery](/help/resending-a-failed-delivery/).
