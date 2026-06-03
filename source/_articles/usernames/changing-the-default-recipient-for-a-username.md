---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/usernames/adding-a-new-username.png
section: content
title: Changing the default recipient for a username
date: 2026-06-03
description: How to set or change the default recipient for an addy.io username. New aliases at that username will forward to this recipient until you change them.
helpCategories: [usernames]
order: 3
---

Each [additional username](/help/adding-an-additional-username/) (and your main username) can have its own **default recipient**. New [aliases](/help/what-are-the-different-kinds-of-aliases/) at that username will forward to this address until you [change the recipients](/help/changing-the-recipients-for-an-alias/) for the alias. This overrides your account’s [global default recipient](/help/changing-the-default-recipient-on-your-account/) for aliases at this username. This article explains how to set or change the default recipient for a username.

<h2 id="where-to-change-the-default-recipient-for-a-username">Where to change the default recipient for a username</h2>

1. [Log in](https://app.addy.io) and go to **Usernames** in the navigation bar.
2. Find the username you want to edit and click the plus icon in the **Default Recipient** column (as shown below).
3. Select the [verified recipient](/help/adding-a-recipient/) you want as the default for this username.
4. Click **Update Default Recipient**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/usernames/changing-the-default-username.png" alt="Default recipient for a username in addy.io" title="Changing the default recipient for a username">
</div>

From then on, any new alias at **this** username (e.g. something@**thisusername**.anonaddy.com) will use this recipient by default. Aliases at other usernames or your account default are unaffected. You can still change the recipient for any individual alias later.

<h2 id="can-i-set-more-than-one-default-recipient">Can I set multiple default recipients?</h2>

Yes, but you have to use **rules** instead of setting them directly because each username can have only **one** default recipient at a time.

If you want all mail at that username to reach more than one inbox, it is possible by using [rules](/help/creating-a-new-rule/). [Create a new rule](/help/creating-a-new-rule/), set the conditions described below and then select the "forward to" action for each [recipient](/help/adding-a-recipient/) you want to receive the mail:

1. **Conditions** - Set an **alias email** condition that matches your username subdomain (for example `*@johndoe.anonaddy.com` or `*@johndoe.anonaddy.me`, where **johndoe** is the username). You can either choose the `ends with` match type or you can select `matches regex` and then enter this `^.+@johndoe\..+$` making sure to replace "johndoe" with your username.
2. **Actions** - Select **forward to** your chosen recipient and then click "Add action" and select **forward to** your next recipient etc.

When an email arrives at an alias on that username, the rule will be matched and applied, so each recipient will receive a copy of the email. Rules are a paid feature (Lite and Pro); see [pricing](/#pricing).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/usernames/multiple-default-recipients-for-a-username.png" alt="Multiple default recipients for a username" title="Multiple default recipients for a username">
</div>
