---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/api-access-token.png
section: content
title: Creating new email aliases
date: 2020-03-03
description: This article guides you through the steps to create a new email alias on addy.io. There are currently two ways to create new aliases.
helpCategories: [aliases]
---

This article guides you through the steps to create a new email alias on addy.io. There are currently two ways to create new aliases.

## Option 1: Create aliases automatically on the fly

To create aliases on the fly all you have to do is make up any new alias and give that out instead of your real email address.

Let's say you're username is **johndoe** and you are signing up to example.com you could enter example@**johndoe**.anonaddy.com (or .me) as your email address.

The alias will show up in your dashboard automatically as soon as it has forwarded its first email.

This works the same way for custom domains and additional usernames, your aliases are created as soon as they receive their first email.

<div class="flex justify-center my-8">
  <img class="shadow" src="/assets/img/help-alias.jpg" alt="New Alias" title="New Alias">
</div>

If you would like to create an alias at a shared domain e.g. @anonaddy.me then you must generate it beforehand using option 2 below.

If you start receiving spam to the alias you can simply deactivate it or delete it all together!

## Option 2: Generate a unique random alias

You can click the "Generate New Alias" button on the website (or use the browser extension) to generate a random character or random word (paid plans only) alias.

<div class="my-8">
  <img class="shadow" src="/assets/img/help-generate-alias.jpg" alt="Generate New Alias" title="Generate New Alias">
</div>

After clicking this button a modal will appear with some options for the alias domain, the alias format and an optional description. It is generally a good idea to add a description for the random character/random word aliases even if you are using a password manager as it can be easy to forget what they were used for.

<div class="my-8">
  <img class="shadow" src="/assets/img/help-generate-alias-modal.jpg" alt="Generate New Alias Modal" title="Generate New Alias Modal">
</div>

Once you are happy with the details click "Generate Alias" and you will see something like the below at the top of your dashboard:

`86064c92-da41-443e-a2bf-5a7b0247842f@anonaddy.me`

or this:

`circus.waltz449@anonaddy.me`

These kinds of aliases are useful if you do not wish to include your username in the email as a potential link between aliases.

You can now give this alias out and start receiving forwarded emails for it.

> **Note**: If you generate a Random Character/Random Word alias at your own username subdomain or custom domain then it **does not count** towards your shared domain alias limit

You can also use the API to generate a new alias, full API documentation can be found here - [https://app.addy.io/docs](https://app.addy.io/docs)