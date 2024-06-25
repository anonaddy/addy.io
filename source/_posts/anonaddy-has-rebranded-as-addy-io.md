---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/addy-io-square.jpg
section: content
title: AnonAddy has rebranded as addy.io
date: 2023-08-09
description: AnonAddy is now addy.io! This post gives some details on what motivated the rebrand, what's actually changed and what features have been added.
categories: [updates]
---

AnonAddy is now addy.io! This post gives some details on what motivated the rebrand, what's actually changed and what features have been added.

## Why the rebrand?

As AnonAddy has continued to grow and gain more users internationally, I wanted a name that was shorter, easier to understand and more recognisable.

Removing 'Anon' from the name doesn't mean the service won't still focus on privacy and anonymity. In fact, the service will remain exactly the same, but with even more new and exciting features that I hope you'll love.

This is why I'm delighted to introduce you to the new name and logo - addy.io!

> **addy** - an address, usually an email address

<div class="flex justify-start">
  <img class="h-48" src="/assets/img/logo-dark.svg" alt="addy.io logo" title="addy.io logo">
</div>

## What's changed?

Well first things first, there's a new logo as shown above! This logo is a play on the `@` symbol and a `padlock` to represent aliases, privacy and security. The main brand colours remain the same.

From now on you'll be using [https://app.addy.io](https://app.addy.io) to access the web application, which you'll notice has had a bit of a user interface redesign. The new web application is a SPA (single page application) so it should feel snappier in general and provide a more pleasant experience.

If you're using the API to make calls then you will need to update your calls to use `https://app.addy.io/api/v1` instead of `https://app.anonaddy.com/api/v1`.

There is also a new contact email that you can find on the [contact page](/contact/) along with a new GPG key.

## Are there any new features?

Not only has the service changed name and logo, but there are also some great new features that are available to use now, including:

**• Bulk actions for aliases**

This addition allows you to select multiple aliases (up to 25) from the web application and perform bulk actions on them all such as; activate, deactivate, edit recipients, delete, forget and restore. See the [API docs](https://app.addy.io/docs/#alias-bulk-actions-POSTapi-v1-aliases-activate-bulk) for more details.

**• 'From Name' for each alias, username and custom domain**

This allows you to set the display `From Name` for each individual alias, for an entire username / custom domain, or for the entire account globally.

The 'From Name' that is used for an alias is determined by the following priority:

1. Alias 'From Name'
2. Username or Custom Domain 'From Name'
3. Global 'From Name' from the settings page

**• Control a username's ability to be used to login**

A new toggle switch has been added for each username that allows you to decide whether or not that username can be used to login to your account. This toggle cannot be disabled for your default username.

**• Display from format for forwarded messages**

You can now change what the `From` header looks like for forwarded messages.

**• New spam / phishing warning banner**

If an incoming message fails DMARC checks or looks like spam, a new warning banner is added to the email.

**• New sort options for aliases with pagination**

You can now sort aliases from the web application by a number of values.

**• Improved search for aliases**

Searches for aliases are now carried out on the server meaning quicker results.

**• Option to change default username**

You can now change your account's default username from the usernames page.

**• Added GBP and EUR currencies**

New currency options have been added so you can also pay in GBP or EUR as well as USD.

**• New display filters for aliases**

You can click through to see all aliases associated with a certain username, domain or recipient.

**• Rules functionality out of beta**

The rules feature allows you to trigger actions when certain conditions are met, for example:

If the subject contains "Spam" then block the email.

**• More to come**

Check the [roadmap](https://github.com/orgs/anonaddy/projects/1/views/1) to stay up-to-date with even more new features that are on the way.

## Do I need to do anything?

For most users, there is nothing you need to do.

All existing alias domains are staying the same. The new `addy.io` domain will be available to those on paid plans shortly.

If you use a hardware key for 2FA on your account, you will receive an email notification shortly with further information.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
