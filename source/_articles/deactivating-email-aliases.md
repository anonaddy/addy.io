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

## Option 2: From a forwarded email

Each email that is forwarded to you by AnonAddy will have some information in a banner (unless you have turned this off in your settings).

<div class="my-8">
  <img class="shadow" src="/assets/img/help-deactivate-alias-from-email.jpg" alt="Deactivate Alias From Email" title="Deactivate Alias From Email">
</div>

The banner information looks like the above image, to deactivate the alias all you need to do is click on the link provided.

> Note: You need to already be logged in (or you can log in after clicking the link) for the alias to be successfully deactivated

The reason you have to be logged in is to protect you when you reply to a forwarded message and potentially expose your alias' deactivation link to the recipient.

All forwarded emails also have a `List-Unsubscribe:` header. This header contains your alias deactivation link mentioned above and also an email address you can send an email to in order to deactivate the alias.

For example: `<mailto:a4e5fc0f-429b-4f1c-v36d-e585826a2911@unsubscribe.anonaddy.com>`

You can simply send an email (subject and body don't matter) to this email address and your alias will be deactivated.

> Note: You must send the email from a verified recipient on your account for the alias to be successfully deactivated

This is again to prevent anyone else deactivating your aliases without your knowledge.

## Option 3: Using the API

To use the API you first need to generate an Access Token from your account settings. You can then make calls to the available API endpoints to get information and make changes to your data.

API documentation for deactivating an alias is available here - [https://app.anonaddy.com/docs/#deactivate-a-specific-alias](https://app.anonaddy.com/docs/#deactivate-a-specific-alias)