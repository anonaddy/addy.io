---
extends: _layouts.article
ogtype: article
image: https://anonaddy.com/assets/img/api-access-token.png
section: content
title: Deactivating email aliases
date: 2019-11-19
description: This article shows you the available options to deactivate an email alias on AnonAddy. There are currently three ways to deactivate email aliases.
helpCategories: [aliases]
---

This article shows you the available options to deactivate an email alias on AnonAddy. There are currently three ways to deactivate email aliases.

## Option 1: From your dashboard

Once logged into AnonAddy you can click on "Aliases" in the navigation bar. Here you will be shown a list of all your aliases.

<div class="flex justify-center my-8">
  <img class="shadow" src="/assets/img/help-deactivate-alias.jpg" alt="Deactivate Alias" title="Deactivate Alias">
</div>

To deactivate an email alias all you have to do is toggle the switch in the column named "Active", it will appear greyed out as shown above.

## Option 2: From the browser extension

The extension is available for download on [Firefox](https://addons.mozilla.org/en-GB/firefox/addon/anonaddy/) and [Chrome](https://chrome.google.com/webstore/detail/anonaddy/iadbdpnoknmbdeolbapdackdcogdmjpe). You can click on any alias that is displayed and then click "Deactivate alias".

<div class="flex justify-center my-8">
  <img class="shadow" src="/assets/img/extension-alias-details.png" alt="Deactivate an Alias from te Extension" title="Deactivate an Alias from te Extension">
</div>

## Option 3: Using one of the mobile apps

Mobile apps for Android:

- AnonAddy by [Stjin](https://twitter.com/Stjinchan) on the [Play Store](https://play.google.com/store/apps/details?id=host.stjin.anonaddy) (paid)
- AnonAddy by [Stjin](https://twitter.com/Stjinchan) on the [F-Droid](https://f-droid.org/packages/host.stjin.anonaddy) (free)
- AddyManager by [KhalidWar](https://github.com/KhalidWar) on the [Play Store](https://play.google.com/store/apps/details?id=com.khalidwar.anonaddy)

Mobile apps for iOS:

- AddyManager by [KhalidWar](https://github.com/KhalidWar) on the [App Store](https://apps.apple.com/us/app/addymanager/id1547461270)


You can deactivate an alias by following the instructions on each app.

## Option 4: Using the API

To use the API you first need to generate an Access Token from your account settings. You can then make calls to the available API endpoints to get information and make changes to your data.

API documentation for deactivating an alias is available here - [https://app.anonaddy.com/docs/#deactivate-a-specific-alias](https://app.anonaddy.com/docs/#deactivate-a-specific-alias)