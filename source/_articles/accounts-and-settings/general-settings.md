---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/accounts-and-settings/general-settings-page.png
section: content
title: General Settings
date: 2026-05-26
description: A guide to addy.io general settings. Learn how to update your account email, set your default recipient, and choose default alias domains and formats when generating new aliases.
helpCategories: [accounts-and-settings]
order: 1
---

General settings control your account-wide preferences, such as the web app theme, updating your email address and which domain and format are used when you create a new alias. This article explains where to find these options and how to change them. For password and two-factor authentication, see [Security settings](/help/security-settings/); for API keys, see [API Settings](/help/api-settings/).

## Where to find General Settings

After [logging in](https://app.addy.io), click on **Settings** in the navigation bar.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/accounts-and-settings/general-settings-page.png" alt="addy.io General Settings" title="General Settings page">
</div>

## Updating your account's email

Your account has an email address that addy.io uses for account-related messages (for example, password reset links and username reminders). This is usually one of your verified [recipient](/help/adding-a-recipient/) addresses.

To change which email is used for these account emails:

1. Open **Settings**.
2. Find the **Update Email** section.
3. Enter your new email and confirm your account password (this is for security).
4. Click the "Update Email" button.
5. Click the verification link in the email that is sent to your new address.

Account and recovery emails will then be sent to the address you specified. Make sure you can access that inbox.

## Default alias domain and format

When you click **Generate New Alias** on the website or in the [browser extension](/help/installing-the-browser-extension/), addy.io can remember your preferred **default alias domain** and **default alias format**. That way the next alias you generate uses those options automatically.

- **Default alias domain** - The domain part of the new alias (e.g. your username subdomain like **johndoe.anonaddy.com**, a [custom domain](/help/adding-a-custom-domain/), or a shared domain like **anonaddy.me**).
- **Default alias format** - The local-part style (e.g. **Random Characters**, **Random Words**, **Custom**, or **UUID**). See [Terminology](/help/terminology/) for format examples.

To set or change these:

1. In **General** settings, find **Default alias domain** and **Default alias format**.
2. Select the domain and format you want as the default.
3. Save your changes.

The next time you generate an alias, the modal will pre-fill with these defaults; you can still change them for that alias if you like. For more on creating aliases, see [Creating new email aliases](/help/creating-new-email-aliases/).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/accounts-and-settings/default-alias-options.png" alt="Default alias domain and format options in General Settings" title="Default alias domain and format">
</div>

## Other general options

Depending on your plan and preferences, you may see other options in general settings. If you do not see a particular setting, it may be under [Security settings](/help/security-settings/) or [API Settings](/help/api-settings/). For subscription and billing, use the subscription section of your account.
