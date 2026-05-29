---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/accounts-and-settings/delete-account.png
section: content
title: How to delete your addy.io account
date: 2026-05-26
description: Step-by-step guide to permanently deleting your addy.io account. Learn what happens to your aliases and data, and whether a deleted account can be restored.
helpCategories: [accounts-and-settings]
order: 5
---

Deleting your addy.io account permanently removes your account, aliases, recipients, and related data. This article explains how to delete your account, what happens to your data when you do, and whether deletion can be undone. Before you delete, consider [exporting your data](/help/importing-and-exporting-account-data/) so you have a backup.

## Before you delete your account

- **Export your data** - Use [Importing and exporting account data](/help/importing-and-exporting-account-data/) to download a copy of your aliases and account data. After deletion you will not be able to access this information.
- **Cancel your subscription** - If you have a paid subscription, cancel it in your account or subscription settings.
- **Use a device you trust** - You will need to log in and confirm the deletion. Use a secure device and a private connection.

## Deleting your account

1. [Log in](https://app.addy.io) to your addy.io account.
2. Go to **Settings** in the navigation bar.
3. Find the **Delete Account** tab.
4. Read the warning. addy.io will ask you to enter your **password** to prove you own the account.
5. Confirm deletion. Your account and associated data will be removed permanently. You will be logged out and will not be able to log in again with that account.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/accounts-and-settings/delete-account.png" alt="Delete account or Close account section in addy.io settings" title="Delete your account">
</div>

> **Warning:** Account deletion is **permanent**. You cannot undo it or recover your aliases, recipients, or settings. Export your data first if you might need it later.

## What happens to my data when I delete my account?

When you delete your account, the following happens:

- **Recipients** - All of your recipients are deleted from the database.
- **Aliases on shared domains** - All of your aliases that use a shared domain (e.g. `@anonaddy.me`) are soft deleted from the database. This is to prevent any chance of another user generating the same alias in the future. Any identifying information, such as the alias description, is removed.
- **Other aliases** - All of your other aliases are deleted from the database.
- **Custom domains** - All of your custom domains are deleted from the database.
- **Your user details** - Your user details are deleted from the database.
- **Usernames** - Your username and any additional usernames that you created are encrypted and added to a table in the database. This is to prevent anybody signing up with the same username in the future.
- **Subscription** - Any subscription information is deleted from the database.

If you need a record of your aliases or settings, [export your data](/help/importing-and-exporting-account-data/) before deleting.

## Can a deleted account be restored?

**No.** Once your account is deleted, it cannot be restored. Your username and any additional usernames cannot be used to sign up again on addy.io.

If you change your mind after deleting, you would need to [create a new account](/help/creating-an-account/) and set up your aliases and recipients again. There is no way to merge or recover an old deleted account. If you are unsure, export your data and consider [deactivating](/help/deactivating-email-aliases/) or [deleting](/help/deleting-an-alias/) individual aliases instead of closing the whole account.
