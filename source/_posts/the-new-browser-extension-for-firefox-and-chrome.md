---
extends: _layouts.post
ogtype: article
image: https://anonaddy.com/assets/img/browser-extension.png
section: content
title: The new browser extension/add-on for Firefox and Chrome
date: 2019-10-14
description: This post gives some more details on the recent launch of the new open-source browser extension/add-on for Firefox and Chromium based browsers. The extension/add-on currently allows you to generate UUID aliases remotely using your API access tokens.
categories: [updates]
---

This post gives some more details on the recent launch of the new open-source browser extension/add-on for Firefox and Chromium based browsers. The extension/add-on currently allows you to generate UUID aliases remotely using your API access tokens.

## Where can I find the extension/add-on?

The new extension/add-on is [open-source](https://github.com/anonaddy/browser-extension) and is available for download for Firefox [here](https://addons.mozilla.org/en-GB/firefox/addon/anonaddy/) and Chromium based browsers (including Brave) [here](https://chrome.google.com/webstore/detail/anonaddy/iadbdpnoknmbdeolbapdackdcogdmjpe).

<div class="flex justify-center">
  <img class="shadow" src="https://anonaddy.com/assets/img/browser-extension.png" alt="Browser extension/add-on" title="Browser extension/add-on">
</div>

## Why does AnonAddy need a browser extension/add-on?

When using AnonAddy you can create standard email aliases on the fly at your own unique username subdomain e.g *@johndoe.anonaddy.com (or .me). However many users prefer to use the UUID aliases that do not include any username information or link to ownership. These types of aliases cannot be created on the fly and must be **generated beforehand**.

I initially expirimented with the idea of using a bookmarklet with a simple link to allow users to generate the aliases, however I quickly ran into CORS (Cross-origin resource sharing) issues and realised this was not going to be possible.

This left a browser extension/add-on as the only viable way to generate UUID aliases remotely from the browser.

## What features does it currently have?

At the moment the extension is quite basic, the only feature it currently has is the ability to generate a new UUID alias.

You can choose the alias domain and add an optional description. If no description is entered for the alias then the current tab's hostname is used instead e.g. "example.com" if your active tab was example.com.

In the future I'd like to add other features such as the ability to search, view and manage all aliases.

## How do I generate an API access token?

To generate an access token you first need to [register](https://app.anonaddy.com/register) an account with AnonAddy. Next head to the [settings](https://app.anonaddy.com/settings) page and scroll down to the bottom.

Click the "Generate New Token" button and enter a short name for the token e.g. "Firefox add-on". Once generated the token will be displayed, this is the only time the token will ever be displayed, so please make a note of it in a safe place (e.g. password manager)!

Copy the token to your clipboard and paste it into the browser extension/add-on and you're ready to start generating aliases.

<div class="flex justify-center mb-4">
  <img class="shadow" src="https://anonaddy.com/assets/img/browser-extension-token.png" alt="Browser extension/add-on token" title="Browser extension/add-on token">
</div>

I'll add more routes for the API and also documentation on how to use it in the coming weeks.

## Feedback and suggestions

If you have any feedback or suggestions please just drop me a line at [contact@anonaddy.com](mailto:contact@anonaddy.com) <span class="break-words">([70E400B5064061EB84181DABEDADE14D67325B36](https://keys.openpgp.org/search?q=70E400B5064061EB84181DABEDADE14D67325B36))</span> and sign up to the newsletter if you'd like to receive updates on new features!
