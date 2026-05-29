---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/usernames/can-be-used-to-login.png
section: content
title: Setting whether a username can be used to login to your account
date: 2026-05-27
description: Control which addy.io usernames can be used to sign in. Turn off "Can Be Used To Login" for a username to block login with that username while keeping it for aliases.
helpCategories: [usernames]
order: 6
---

By default, every [username](/help/adding-an-additional-username/) on your account (your sign-up username and additional usernames) can be used to [log in](/help/logging-into-your-account/) with your account password. You can turn off **Can Be Used To Login** for a username so that it can no longer be used to sign in; the username and its aliases stay active for receiving and sending mail. This is useful if you want to use a username only for aliases and not as a login option (e.g. on a shared or less secure device). This article explains how to change this setting.

## How to allow or disallow login for a username

1. [Log in](https://app.addy.io) and go to **Usernames** in the navigation bar.
2. Find the username you want to change and click "Edit" on the right-hand side of the table.
3. Find **Can Be Used To Login**. It is a toggle switch.
4. Turn it **on** to allow signing in with this username, or **off** to prevent login with this username. Changes are saved automatically.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/usernames/can-be-used-to-login.png" alt="Can Be Used To Login setting for a username in addy.io" title="Setting whether a username can be used to login">
</div>

When **Can Be Used To Login** is off, that username cannot be entered on the login screen; you must use another username that has the setting on. The username still works for aliases (e.g. mail@**thisusername**.anonaddy.com), [default recipient](/help/changing-the-default-recipient-for-a-username/), and [catch-all](/help/understanding-catch-all-and-alias-auto-create-regex-for-a-username/)-only login is disabled. You can turn it back on at any time.
