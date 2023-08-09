---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/browser-extension.png
section: content
title: The new browser extension for Firefox and Chrome
date: 2019-10-14
description: This post gives some more details on the recent launch of the new open-source browser extension for Firefox and Chromium based browsers. The extension currently allows you to generate UUID aliases remotely using your API access tokens.
categories: [updates]
---

This post gives some more details on the recent launch of the new open-source browser extension for Firefox and Chromium based browsers. The extension currently allows you to generate UUID aliases remotely using your API access tokens.

## Where can I find the extension?

The new extension is [open-source](https://github.com/anonaddy/browser-extension) and is available for download for Firefox [here](https://addons.mozilla.org/en-GB/firefox/addon/anonaddy/) and Chromium based browsers (including Brave) [here](https://chrome.google.com/webstore/detail/anonaddy/iadbdpnoknmbdeolbapdackdcogdmjpe).

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/browser-extension.png" alt="Browser extension" title="Browser extension">
</div>

## Why does addy.io need a browser extension?

When using addy.io you can create standard email aliases on the fly at your own unique username subdomain e.g *@johndoe.anonaddy.com (or .me). However, many users prefer to use the UUID aliases that do not include any username information or link to ownership. These types of aliases cannot be created on the fly and must be **generated beforehand**.

I initially experimented with the idea of using a bookmarklet with a simple link to allow users to generate the aliases, however I quickly ran into CORS (Cross-origin resource sharing) issues and realised this was not going to be possible.

This left a browser extension as the only viable way to generate UUID aliases remotely from the browser.

## What features does it currently have?

At the moment the extension is quite simple, the only feature it currently has is the ability to generate a new UUID alias.

You can choose the alias domain and add an optional description. If no description is entered for the alias then the current tab's hostname is used instead e.g. "example.com" if your active tab was example.com.

In the future I'd like to add other features such as the ability to search, view and manage all aliases.

## How do I generate an API access token?

To generate an access token you first need to [register](https://app.addy.io/register) an account with addy.io. Next head to the [settings](https://app.addy.io/settings/api) page and scroll down to the bottom.

Click the "Generate New Token" button and enter a short name for the token e.g. "Firefox". Once generated, the token will be displayed. This is the only time the token will ever be displayed, so please make a note of it in a safe place (e.g. password manager)!

Copy the token to your clipboard and paste it into the browser extension and you're ready to start generating aliases.

<div class="flex justify-center mb-4">
  <img class="shadow" src="/assets/img/browser-extension-token.png" alt="Browser extension token" title="Browser extension token">
</div>

I'll add more routes for the API and also documentation on how to use it in the coming weeks.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
