---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/share/addy-io-rules-can-now-send-a-webhook.png
section: content
title: addy.io rules can now send a webhook
date: 2026-10-14
description: Lite and Pro rules can send a signed JSON POST to a public https URL when a matching email is accepted. Include the message body and headers only if you want them. Attachments are not included.
categories: [updates]
---

I'm pleased to announce a new rule action: **send a webhook**. On Lite and Pro, a rule can send a signed JSON POST to a public https URL you choose when a matching email is accepted.

Use it to notify your own app, a form, or an automation tool. For example, add a row when a shop alias receives a receipt, or tell your server when a login alias gets mail. A [Zapier example](/help/sending-a-webhook/#example-zapier) in the Help Centre shows how to add a spreadsheet row. The same URL works with other tools that give you a webhook address, such as Make or n8n.

<div class="flex justify-center mb-6">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/rules/rule-webhooks.png" alt="Rule webhooks" title="Rule webhooks">
</div>

## What addy.io sends

The POST is JSON. It includes the alias, the sender, the subject, and whether the email was a forward, a reply, or a send. You can also include the message body and the headers. Leave those options off to receive the details only.

Attachments are not included. The payload reports how many files the email had.

Each request is signed with a secret for your account, so you can check that it came from addy.io. If deliveries to a URL keep failing, addy.io pauses that URL for one hour and emails you. The rule stays active.

## Who can use webhooks?

Webhooks are available on **Lite and Pro** as part of the Rules system. They are not included on the Free plan. Duo and Family members get them as part of Pro.

For how to add the action, what is in the payload, and how to check the signature, see [Sending a webhook](/help/sending-a-webhook/) in the Help Centre.

<span data-pricing>Compare plans on the [pricing page](/pricing/).</span>

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!

Thank you for using addy.io.
