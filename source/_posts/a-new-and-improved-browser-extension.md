---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/extension-v2.png
section: content
title: A new and improved browser extension
date: 2021-06-17
description: This post provides more details on the updated browser extension and the new increased Pro plan limits
categories: [updates]
---

This post provides more details on the updated browser extension and the new increased Pro plan limits.

## The updated browser extension

For a long time I've been meaning to update the browser extension so that it included more features than simply the ability to create a new alias. I recently made time to give it a big update that will hopefully come as a huge improvement to addy.io users.

Below is a full list of all the new features in v2 of the browser extension:

- View aliases
- Search aliases by email or description
- View individual alias details
- Add/Edit alias descriptions
- Activate/Deactivate aliases
- Delete/Restore aliases
- Forget aliases
- Use the "send from address constructor" for an alias
- Choose recipient(s) when creating a new alias

You can find the extension on [Firefox](https://addons.mozilla.org/en-GB/firefox/addon/anonaddy/) and [Chrome](https://chrome.google.com/webstore/detail/anonaddy/iadbdpnoknmbdeolbapdackdcogdmjpe). If you find the extension useful I'd really appreciate it if you could leave a quick review.

<div class="flex justify-center mb-4">
  <img class="shadow" src="/assets/img/browser-extension-v2.png" alt="Browser Extension v2" title="Browser Extension v2">
</div>

A couple of changes were made to the [GET aliases](https://app.addy.io/docs/#get-all-aliases) and [GET recipients](https://app.addy.io/docs/#get-all-recipients) API endpoints, adding query parameters to filter the response for the extension.

Down the line I plan to add more features to the browser extension such as:

- Edit alias recipients
- View account details, usage and limits

If you have any features you'd like to see added or suggestions for the extension, please feel free to post them [here](https://github.com/anonaddy/anonaddy/discussions).

## Increasing some Pro plan limits

I also recently increased a couple of the limits for the Pro plan, these are:

- Additional Usernames from 3 to **10**
- Custom domains from 10 to **20**

I had received some feedback that users would like to add multiple subdomains in order to better compartmentalise their own aliases which is why I increased the custom domain limit.

I hope those on the Pro plan will find these new limits useful.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
