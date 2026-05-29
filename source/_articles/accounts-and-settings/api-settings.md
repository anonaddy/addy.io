---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/accounts-and-settings/api-settings-page.png
section: content
title: API Settings
date: 2026-05-26
description: How to create, use, and delete addy.io API keys. Manage your API keys in account settings and find links to the full API documentation.
helpCategories: [accounts-and-settings]
order: 3
---

The addy.io API lets you manage aliases, recipients, and other account data from your own apps or scripts. To use the API, you create an **API key** in your account settings and send it with each request. This article explains how to create, use, and delete API keys. For full endpoint details and examples, see the [API documentation](https://app.addy.io/docs) at app.addy.io/docs.

<h2 id="where-to-find-api-settings">Where to find API Settings</h2>

After [logging in](https://app.addy.io), go to **Settings** in the navigation bar and click on the **API** tab. Here you can create new API keys and see or revoke existing ones.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/accounts-and-settings/api-settings-page.png" alt="addy.io API Settings page showing API keys" title="API Settings page">
</div>

<h2 id="creating-an-api-key">Creating an API key</h2>

An API key acts like a password for the API: you use it to authenticate your requests. Create a separate key for each app or script, and give it a clear name so you can recognise it later.

To create a new API key:

1. Open **API** in your account settings.
2. Click **Create New API Key**.
3. Enter a **name** for the key (e.g. "Mobile app" or "Backup script"). This helps you identify it in the list later. You can also optionally choose an expiration time for this key.
4. Click **Create API Key**. addy.io will show the new key **once**. Copy it and store it somewhere secure (e.g. a password manager). You will not be able to see the full key again after you leave the page.
5. If you lose the key before saving it, delete that key and create a new one.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/accounts-and-settings/api-create-new-key.png" alt="Create new API key form in addy.io" title="Creating an API key">
</div>

> **Important:** Treat your API key like a password. Do not share it or commit it to public code. If a key is exposed, [delete it](#deleting-an-api-key) in API settings and create a new one.

<h2 id="using-the-api-and-your-key">Using the API and your key</h2>

Send your API key with each API request so addy.io can identify your account. You do this by adding an **Authorization** header, for example:

- **Bearer token:** `Authorization: Bearer your_api_key_here`

The base URL for the API is **https://app.addy.io/api/v1/** (or as stated in the docs). Use the documentation to find the exact endpoints for the actions you need (e.g. [creating aliases](https://app.addy.io/docs), [deactivating an alias](https://app.addy.io/docs/#deactivate-a-specific-alias), or managing recipients).

Full API documentation: **[https://app.addy.io/docs](https://app.addy.io/docs)**

<h2 id="deleting-an-api-key">Deleting an API key</h2>

If you stop using an app or script, or you think an API key has been compromised, you should revoke (delete) it so it can no longer be used.

To delete an API key:

1. Click on the **API Keys** tab in your account settings.
2. Find the key you want to remove (use the name you gave it when creating).
3. Click **Delete** next to that key.
4. Confirm when prompted. The key is invalid immediately; any app or script using it will get authentication errors until you provide a new API key.

You can create a new API key at any time if you need to replace a deleted one or add another app.
