---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/recipients/changing-the-default-recipient-on-your-account.png
section: content
title: Changing the default recipient on your account
date: 2026-05-27
description: How to set or change the default recipient for your addy.io account. New aliases forward to this address until you assign them a different recipient.
helpCategories: [recipients]
order: 2
---

The **default recipient** is the address where new aliases forward mail when you have not chosen a different recipient for that alias. You can set one in your [general settings](/help/general-settings/) so that every new alias uses your preferred inbox by default. You can still [change the recipients](/help/changing-the-recipients-for-an-alias/) for any alias later. This article explains how to change your account’s default recipient.

## Where to change the default recipient

1. [Log in](https://app.addy.io) and go to **Recipients** in the navigation bar.
2. Find the recipient you want as the new default and click **Make Default** underneath it (as shown in the red box below).
3. Confirm in the modal by clicking **Make default recipient**.

From then on, any **new** alias you create (on the fly or by generating) will use this recipient until you change it for that alias. Existing aliases keep their current recipients unless you edit them.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/recipients/changing-the-default-recipient-on-your-account.png" alt="Default recipient setting in addy.io account settings" title="Changing the default recipient">
</div>

You can also set a default recipient **per domain** or **per username** (e.g. for a [custom domain](/help/adding-a-custom-domain/) or [additional username](/help/adding-an-additional-username/)). Those options override the account default for aliases at that domain or username. See [Changing the default recipient for a domain](/help/changing-the-default-recipient-for-a-domain/) and [Changing the default recipient for a username](/help/changing-the-default-recipient-for-a-username/).
