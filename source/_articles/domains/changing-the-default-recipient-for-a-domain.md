---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/domains/default-recipient-domain.png
section: content
title: Changing the default recipient for a domain
date: 2026-06-03
description: How to set or change the default recipient for a custom domain on addy.io. New aliases at that domain will forward to this recipient until you change them.
helpCategories: [domains]
order: 3
---

Each [custom domain](/help/adding-a-custom-domain/) (and [subdomain](/help/adding-a-custom-subdomain/)) can have its own **default recipient**. New [aliases](/help/what-are-the-different-kinds-of-aliases/) at that domain will forward to this address until you [change the recipients](/help/changing-the-recipients-for-an-alias/) for the alias. This overrides your account’s [global default recipient](/help/changing-the-default-recipient-on-your-account/) for aliases at this domain. This article explains how to set or change the default recipient for a domain.

<h2 id="where-to-change-the-default-recipient-for-a-domain">Where to change the default recipient for a domain</h2>

1. [Log in](https://app.addy.io) and go to **Domains** in the navigation bar.
2. Find the domain you want to edit and click the plus icon in the **Default Recipient** column (as shown in the red box below).
3. Select the recipient you want as the default for this domain.
4. Click **Update Default Recipient**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/domains/default-recipient-domain.png" alt="Default recipient for a domain in addy.io" title="Changing the default recipient for a domain">
</div>

From then on, any new alias at **this** domain (e.g. hello@**yourdomain.com**) will use this recipient by default. Aliases at other domains or your account default are unaffected. You can still change the recipient for any individual alias later.

<h2 id="can-i-set-more-than-one-default-recipient">Can I set multiple default recipients?</h2>

Yes, but you have to use **rules** instead of setting them directly because each domain can have only **one** default recipient at a time.

If you want all mail at that domain to reach more than one inbox, it is possible by using [rules](/help/creating-a-new-rule/). [Create a new rule](/help/creating-a-new-rule/), set the conditions described below and then select the "forward to" action for each [recipient](/help/adding-a-recipient/) you want to receive the mail:

1. **Conditions** - Set an **alias email** condition that matches your custom domain (for example `@yourdomain.com`). Choose the `ends with` match type and enter this `@yourdomain.com` making sure to replace "yourdomain.com" with your actual custom domain.
2. **Actions** - Select **forward to** your chosen recipient and then click "Add action" and select **forward to** your next recipient etc.

When an email arrives at an alias on that domain, the rule will be matched and applied, so each recipient will receive a copy of the email. Rules are a paid feature (Lite and Pro); see [pricing](/#pricing).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/domains/multiple-default-recipients-for-a-custom-domain.png" alt="Multiple default recipients for a custom domain" title="Multiple default recipients for a custom domain">
</div>
