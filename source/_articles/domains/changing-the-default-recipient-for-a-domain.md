---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/domains/default-recipient-domain.png
section: content
title: Changing the default recipient for a domain
date: 2026-05-27
description: How to set or change the default recipient for a custom domain on addy.io. New aliases at that domain will forward to this recipient until you change them.
helpCategories: [domains]
order: 3
---

Each [custom domain](/help/adding-a-custom-domain/) (and [subdomain](/help/adding-a-custom-subdomain/)) can have its own **default recipient**. New [aliases](/help/what-are-the-different-kinds-of-aliases/) at that domain will forward to this address until you [change the recipients](/help/changing-the-recipients-for-an-alias/) for the alias. This overrides your account’s [global default recipient](/help/changing-the-default-recipient-on-your-account/) for aliases at this domain. This article explains how to set or change the default recipient for a domain.

## Where to change the default recipient for a domain

1. [Log in](https://app.addy.io) and go to **Domains** in the navigation bar.
2. Find the domain you want to edit and click the plus icon in the **Default Recipient** column (as shown in the red box below).
3. Select the recipient you want as the default for this domain.
4. Click **Update Default Recipient**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/domains/default-recipient-domain.png" alt="Default recipient for a domain in addy.io" title="Changing the default recipient for a domain">
</div>

From then on, any new alias at **this** domain (e.g. hello@**yourdomain.com**) will use this recipient by default. Aliases at other domains or your account default are unaffected. You can still change the recipient for any individual alias later.
