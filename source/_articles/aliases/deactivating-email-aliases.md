---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/view-all-aliases.png
section: content
title: Deactivating email aliases
date: 2026-05-28
description: How to deactivate an email alias on addy.io. Stop an alias from forwarding mail from the dashboard, from a forwarded email, browser extension, mobile app, or API. Deactivated aliases can be turned back on.
helpCategories: [aliases]
order: 3
---

Deactivating an alias stops it from forwarding mail. Messages sent to it are **silently discarded** and the sender is not notified. You can turn the alias back on at any time. This article explains how to deactivate an alias from the dashboard, a forwarded email, the [browser extension](/help/installing-the-browser-extension/), [mobile app](/help/downloading-and-using-the-mobile-app/), or [API](https://app.addy.io/docs).

## Option 1: From your dashboard

1. [Log in](https://app.addy.io) and go to **Aliases** in the navigation bar.
2. Find the alias you want to pause and turn **Active** off using the toggle in the **Active** column (as shown below).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/deactivating-an-alias.png" alt="Deactivate an alias using the Active toggle in addy.io" title="Deactivating an alias">
</div>

## Option 2: From a forwarded email

Each forwarded email includes a banner (unless you have turned it off under **Settings** > **General**). Click the deactivate link in that banner.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/deactivating-an-alias-from-an-email.png" alt="Deactivate an alias from the forwarded email banner" title="Deactivating an alias from email">
</div>

You must be [logged in](https://app.addy.io) (or log in after clicking the link) for deactivation to succeed. This protects you if you reply to a forwarded message and might expose the deactivation link to the other party.

## Option 3: From the browser extension

1. Open the addy.io extension ([Firefox](https://addons.mozilla.org/en-GB/firefox/addon/addy_io/) or [Chrome](https://chrome.google.com/webstore/detail/addyio-anonymous-email-fo/iadbdpnoknmbdeolbapdackdcogdmjpe)).
2. Click an alias, then choose **Deactivate alias**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/extension-alias-details.png" alt="Deactivate an alias from the browser extension" title="Deactivating an alias from the extension">
</div>

## Option 4: From the mobile apps

- [Google Play](https://play.google.com/store/apps/details?id=host.stjin.anonaddy)
- [F-Droid](https://f-droid.org/packages/host.stjin.anonaddy)
- [App Store](https://apps.apple.com/app/addy-io/id1535634360)

Open the alias in the app and use the deactivate option. See [Downloading and using the mobile app](/help/downloading-and-using-the-mobile-app/) for more.

## Option 5: Using the API

Create an [API key](/help/api-settings/) under **Settings** > **API**, then use the deactivate endpoint. See [API documentation](https://app.addy.io/docs/#deactivate-a-specific-alias).

## Deactivate vs delete vs forget

- **[Deactivate](/help/deactivating-email-aliases/)** - Pause forwarding; alias stays on your account.
- **[Delete](/help/deleting-an-alias/)** - Remove the alias; mail is rejected; you can [restore](/help/restoring-a-deleted-alias/) it later.
- **[Forget](/help/forgetting-an-alias/)** - Permanently give up the alias (shared-domain aliases cannot be restored).
