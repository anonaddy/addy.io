---
extends: _layouts.article
ogtype: article
image: https://anonaddy.com/assets/img/send-from-alias.png
section: content
title: Sending email from an alias
date: 2020-03-03
description: This article guides you through the steps to send an email from an email alias on AnonAddy. This allows you to initiate a conversation without first having to receive an email you can reply to.
helpCategories: [aliases]
---

This article guides you through the steps to send an email from an email alias on AnonAddy. This allows you to initiate a conversation without first having to receive an email you can reply to.

## An example of how it works

Let's say that you have the alias **first@johndoe.anonaddy.com** and you want to send an email to **hello@example.com**.

All you need to do is enter the following in the To: field.

<span class="break-words"><first+hello=example.com@johndoe.anonaddy.com></span>

> **Note**: you must send the email from a verified recipient on your account.

Then send the email exactly as you would any other. To check that the email has sent successfully, look in your dashboard at the sent count column and see if it has been incremented for that alias.

This works exactly the same for UUID/Random Word aliases, additional usernames and custom domains.

You can even use the send from feature to create an alias on the fly that does not yet exist. This only works for standard aliases or those at custom domains that behave as a catch-all.

You must generate aliases that use shared domains (e.g. circus.waltz449@anonaddy.me) beforehand in order to be able to send from them.

If you need to send an email to an address with an extension e.g. **hello+whatever@example.com** then it's exactly the same method:

<span class="break-words"><first+hello+whatever=example.com@johndoe.anonaddy.com></span>

Just enter the extension too!

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/send-from-alias.png" alt="Send from alias" title="Send from alias">
</div>