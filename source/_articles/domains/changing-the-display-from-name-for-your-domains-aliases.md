---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/domains/display-from-name-domain.png
section: content
title: Changing the display from name for your domain's aliases
date: 2026-05-27
description: Set a default display name (from name) for all aliases at a custom domain on addy.io. Recipients see this name when you send or reply from aliases at that domain.
helpCategories: [domains]
order: 4
---

You can set a **default display from name** for all [aliases](/help/what-are-the-different-kinds-of-aliases/) under a [custom domain](/help/adding-a-custom-domain/). When you [send](/help/sending-email-from-an-alias/) or [reply](/help/replying-to-email-using-an-alias/) from an alias at that domain, the recipient will see this name in the **From** field (e.g. "Support" in **Support** &lt;alias@yourdomain.com&gt;) unless you have overridden it for a specific alias. This article explains how to set or change the display from name for a domain.

## Where to change the display from name for a domain

1. [Log in](https://app.addy.io) and go to **Domains** in the navigation bar.
2. Find the domain you want to edit and click "Edit" on the right-hand side of the table.
3. Find **Domain 'From Name'**. Enter the name you want recipients to see when you send or reply from aliases at this domain (e.g. "John" or "Jane").
4. Click **Update From Name**. New and existing aliases at this domain will use this default; you can still [override it per alias](/help/updating-an-alias-display-from-name/) if needed.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/domains/display-from-name-domain.png" alt="Display from name for a domain in addy.io" title="Display from name for a domain">
</div>

If you leave the field blank, the From field may show only the alias email address. Setting a default at the domain level keeps a consistent identity for all aliases at that domain unless you change it for individual aliases.
