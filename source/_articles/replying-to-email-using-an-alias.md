---
extends: _layouts.article
ogtype: article
image: https://anonaddy.com/assets/img/help-replying.png
section: content
title: Replying to email using an alias
date: 2020-03-03
description: This article guides you through the steps to reply to an email forwarded to you on AnonAddy. This allows you to reply anonymously without revealing your real email address.
helpCategories: [aliases]
---

This article guides you through the steps to reply to an email forwarded to you on AnonAddy. This allows you to reply anonymously without revealing your real email address.

## An example of how it works

Each forwarded email has a Reply-To: header set. This header will look something like this:

Reply-To: <<span class="break-words"><alias+hello=example.com@johndoe.anonaddy.com></span>>

Where hello@example.com is the address of the person who sent you the email and alias@johndoe.anonaddy.com is the alias that forwarded you the email.

Almost all mail clients respect the Reply-To: header, so all you need to do is click reply and it should automatically fill the To: field with the correct address.

Some users have reported that Gmail's web mail has not been using the Reply-To header. If this is the case then you will have to manually copy the value of the Reply-To header and use this instead.

To check if a reply has worked properly check in your dashboard if the reply count has been incremented for that alias.

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/help-replying.png" alt="Alias reply count" title="Alias reply count">
</div>