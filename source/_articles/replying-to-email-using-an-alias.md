---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/send-from-alias-construction.jpg
section: content
title: Replying to email using an alias
date: 2020-10-13
description: This article guides you through the steps to reply to an email forwarded to you on addy.io. This allows you to reply anonymously without revealing your real email address.
helpCategories: [aliases]
---

This article guides you through the steps to reply to an email forwarded to you on addy.io. This allows you to reply anonymously without revealing your real email address.

## An example of how it works

<div class="flex justify-center mb-4">
  <img class="shadow" src="/assets/img/send-from-alias-construction.jpg" alt="Send from alias construction" title="Send from alias construction">
</div>

Each forwarded email has a From: header set. This header will look something like this:

From: <span class="break-words"><alias+hello=example.com@johndoe.anonaddy.com></span>

Where hello@example.com is the address of the person who sent you the email and alias@johndoe.anonaddy.com is the alias that forwarded you the email.

All you need to do is click reply in your email client or web interface and it will automatically fill the To: field with the correct address.

To check if a reply has worked properly check in your dashboard if the reply count has been incremented for that alias.

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/help-replying.png" alt="Alias reply count" title="Alias reply count">
</div>