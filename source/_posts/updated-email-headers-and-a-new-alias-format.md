---
extends: _layouts.post
ogtype: article
image: https://anonaddy.com/assets/img/send-from-alias-modal.png
section: content
title: Updated email headers and a new alias format
date: 2021-01-12
description: This post covers some recent updates, including new email headers, the new random characters alias format and the new email address constructor for sending from an alias.
categories: [updates]
---

This post covers some recent updates, including new email headers, the new random characters alias format and the new address constructor for sending email from an alias.

## The new email headers

Okay, so what's changed with the new email headers?

On forwarded emails the `To:` header will now be set to the alias that the email was **originally sent to**. This change was added to make it much easier to quickly see which alias has been used and to allow better filtering/inbox rules for sorting incoming emails.

On forwarded emails the `Reply-To:` header has been removed and instead will be set as the `From:` header. The reason for this change was because many users were having trouble with Gmail and a few email clients that were not respecting the `Reply-To:` header when they clicked reply. It would previously fill it with the `From:` header instead. This change fixes that issue and makes replying to aliases more reliable.

On forwarded emails the original `Message-ID:` header will be kept the same, but in replies and when sending from aliases the `Message-ID:` header will be replaced as it can sometimes reveal information about your real email address such as its domain.

Email forwards and replies will now keep the `In-Reply-To:` and `References:` headers which allow clients to recognise and sort threaded conversations.

A new header - `X-AnonAddy-Original-Sender:` has also been added to allow you to more easily set up rules/filters on forwarded emails based on the original sender.

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/new-email-headers.jpg" alt="New email headers" title="New email headers">
</div>

## The new random characters alias format

I've received quite a few requests to add a new alias format that could be used instead of the very long UUID format. I recently added a new alias format called `Random Characters` that is available on all plans.

This new format is an 8 character long alphanumeric string, which means it consists of just letters and numbers. An example of one of these aliases looks like this:

`70jkspy8@anonaddy.me`

I've set this as the default format for new accounts as the concept of UUID aliases may be unfamiliar to those not from a programming background.

The UUID format has not been removed and you can still select this format if you like.

## The address constructor for sending from an alias

A common request has been to add an easy way to construct the correct email address that you should send your message to when you would like to send from an alias (initiate an email conversation).

I have written an article on how to manually construct the correct address here - [sending email from an alias](/help/sending-email-from-an-alias/). The problem was that manually construcing the correct address can be confusing.

In the web application next to each alias you can now click the three dots (more options) button which will display a dropdown menu with a "Send from" option.

Clicking that will bring up a modal where you simply need to enter the email destination that you would like to send the message to. Once you click "Show address" the correct email address is displayed and can be easily copied to your clipboard and pasted into your email client.

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/send-from-alias-modal.png" alt="Send from alias modal" title="Send from alias modal">
</div>

## What happened on December 17th?

On Thursday the 17th December AnonAddy's hosting provider Greenhost suffered a large DDoS attack targeting one of their customers. This attack was large enough to also affect other parts of their network and it took AnonAddy offline for roughly 4 hours. I apologise if this downtime affected you in any way.

Greenhost have more details on the incident here - [https://status.greenhost.net/incidents/22](https://status.greenhost.net/incidents/22).

They have taken measures to make their infrastructure more resilient and fault tolerant and added DDoS mitigation.

On the back of this I will be looking into ways to make AnonAddy more resilient too by adding a backup mail server so that emails can continue to be delivered in the event of any downtime with the main mail server.

## A new public roadmap

I've been looking for a good place to start a public roadmap for AnonAddy and was considering Trello/Notion but recently learnt that you could use GitHub projects to create one.

The roadmap is visible on GitHub here - [AnonAddy Roadmap](https://github.com/anonaddy/anonaddy/projects/1) (there's also a link to it at the bottom of this site). I thought it would be easier to keep things in one place to stay organised.

I've also enabled [GitHub discussions](https://github.com/anonaddy/anonaddy/discussions) on the repository where you can add feature requests, ask questions or just chat in general.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
