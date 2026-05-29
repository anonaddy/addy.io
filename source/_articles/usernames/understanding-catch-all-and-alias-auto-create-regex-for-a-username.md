---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/usernames/catch-all-username.png
section: content
title: Understanding catch-all and alias auto create regex for a username
date: 2026-05-27
description: How catch-all and alias auto create regex work for an addy.io username. Automatically create aliases when mail arrives, and optionally limit which addresses are accepted using regex.
helpCategories: [usernames]
order: 4
---

For a [username](/help/adding-an-additional-username/) (your main or additional username), **catch-all** lets addy.io create [standard aliases](/help/what-are-the-different-kinds-of-aliases/) automatically when the first email arrives at an address on that username's domain. You can optionally use an **alias auto create regex** to allow only certain local-parts (the part before the @). This article explains how to enable catch-all and use the regex for a username. The same concepts apply to [custom domains](/help/understanding-catch-all-and-alias-auto-create-regex-for-a-domain/).

<h2 id="what-is-catch-all">What is catch-all?</h2>

When **catch-all** is enabled for a username (e.g. **johndoe**), any email sent to **anything@johndoe.anonaddy.com** (or your username's domain) will **create that alias automatically** when it receives its first message. You do not need to pre-create the alias. If catch-all is **disabled**, only addresses for aliases that already exist are accepted; all others are rejected. See [Terminology](/help/terminology/#catch-all) for more.

Catch-all is useful if you want to give out many addresses (e.g. `site@johndoe.anonaddy.com`, `newsletter@johndoe.anonaddy.com`) without generating each one in the dashboard. Turn catch-all on or off per username on the **Usernames** page using the **Catch-All** toggle (as shown below).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/usernames/catch-all-username.png" alt="Catch-all and alias auto create regex for a username in addy.io" title="Catch-all for a username">
</div>

<h2 id="alias-auto-create-regex">Alias auto create regex</h2>

The **alias auto create regex** lets you allow only certain local-parts to be auto-created when **catch-all is off**. You enter a **regular expression** that the local part must match. Only matching addresses will create a new alias; others are rejected. **Catch-all must be disabled** before you can use auto create regex (configure both on the username **Edit** page).

**Examples:**

- Allow only local-parts that look like words (letters): e.g. `^[a-zA-Z]+$`
- Allow only local-parts containing a dot: e.g. `\.` (contains a dot)
- Allow only local-parts that start with "news": e.g. `^news`

If you leave the regex empty (and catch-all is off), then no local-parts are allowed to be created on-the-fly. Check the on-screen help for the exact syntax and behaviour. Incorrect regex can block wanted mail or allow unwanted patterns, so test carefully by using the "Test Alias Auto Create Regex" section shown below.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/usernames/username-auto-create-regex.png" alt="Auto create regex for a username" title="Auto create regex for a username">
</div>

<h2 id="summary">Summary</h2>

- **Catch-all on** - Any address at the username’s domain can receive mail; new aliases are created on first email.
- **Catch-all off** - Only pre-existing aliases at that domain receive mail.
- **Alias auto create regex** - When catch-all is off, only local-parts matching the regex will auto-create an alias; others are rejected.
