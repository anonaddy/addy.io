---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/recipients/allow-reply-send.png
section: content
title: Allowing or disallowing a recipient to reply/send from your aliases
date: 2026-05-27
description: Control whether a recipient can reply to or send new emails from your addy.io aliases. Enable or disable reply/send per recipient.
helpCategories: [recipients]
order: 3
---

By default, [recipients](/help/adding-a-recipient/) can both **receive** forwarded mail and **reply or send** from your [aliases](/help/what-are-the-different-kinds-of-aliases/) when they use that recipient address. You can turn off reply/send for a recipient so they only receive forwards and cannot send or reply as the alias. This article explains how to allow or disallow a recipient to reply and send from your aliases.

## Why control reply/send per recipient?

If you use several recipients (e.g. different inboxes for different aliases), you may want one address only for receiving and another allowed to reply and send. Disallowing reply/send keeps that recipient as a “receive only” inbox.

## How to allow or disallow reply/send for a recipient

1. [Log in](https://app.addy.io) and go to **Recipients** in the navigation bar.
2. Find the recipient you want to change and click "Edit" on the right-hand side of the table.
3. Find **Can Reply/Send from Aliases** (toggle).
4. Turn it **on** to allow that recipient to [reply](/help/replying-to-email-using-an-alias/) and [send](/help/sending-email-from-an-alias/) from your aliases. Turn it **off** for receive-only forwarding.

If you attempt to reply/send from a recipient that has this setting OFF then you will be sent an email notification informing you that it was not successful.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/recipients/allow-reply-send.png" alt="Allow or disallow reply/send for a recipient in addy.io" title="Allowing reply/send for a recipient">
</div>

Recipients must be [verified](/help/adding-a-recipient/) before they can receive or reply/send. If you disallow reply/send, that recipient will still receive all forwarded mail for aliases that use it; they just cannot send or reply from those aliases.
