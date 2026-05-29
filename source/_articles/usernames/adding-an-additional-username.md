---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/usernames/adding-a-new-username.png
section: content
title: Adding an additional username
date: 2026-05-28
description: How to add an additional username on addy.io. Create extra usernames to compartmentalise aliases, get more subdomains like you@username.anonaddy.com, and control login and default recipient per username.
helpCategories: [usernames]
order: 1
---

Additional usernames let you create more subdomains (e.g. `shop@**janedoe**.anonaddy.com`) so you can keep aliases separate and harder to link together. Each username can have its own [default recipient](/help/changing-the-default-recipient-for-a-username/) and you can control whether it can be used to [log in](/help/logging-into-your-account/). This article explains how to add an additional username and how many you can have.

## Before you add a username

- Choose a username **unrelated** to the one you signed up with and not used elsewhere online.
- **Plan limits** - Lite allows **5** additional usernames (6 total including your sign-up username); Pro allows **20** additional (21 total). See [pricing](/#pricing).
- If you delete a username immediately after adding it, that username **cannot be used again**.

## How to add an additional username

1. [Log in](https://app.addy.io) and go to **Usernames** in the navigation bar.
2. Click **Add Username** (or the equivalent button on the page).
3. Enter the username you want (e.g. `janedoe`) and submit. If it is available, it is added to your account.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/usernames/adding-a-new-username.png" alt="Add additional username in addy.io" title="Adding an additional username">
</div>

4. Optionally add a description and set a [default recipient](/help/changing-the-default-recipient-for-a-username/) for this username (overrides your account default for aliases at that username).
5. Use **Can Be Used To Login** if you want to sign in with this username. See [Setting whether a username can be used to login](/help/setting-whether-a-username-can-be-used-to-login-to-your-account/).

## Using your new username

You can use an additional username like your main one:

- Create [standard aliases](/help/what-are-the-different-kinds-of-aliases/) on the fly at `anything@janedoe.anonaddy.com` or `anything@janedoe.anonaddy.me` (with [catch-all](/help/understanding-catch-all-and-alias-auto-create-regex-for-a-username/) enabled).
- Generate aliases via **Aliases** > **Create Alias**, the [browser extension](/help/installing-the-browser-extension/), [mobile app](/help/downloading-and-using-the-mobile-app/), or [API](https://app.addy.io/docs).

You can also add usernames via the API. See [API documentation](https://app.addy.io/docs).
