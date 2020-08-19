---
extends: _layouts.post
ogtype: article
section: content
title: A new server and the launch of the Pro plan
date: 2019-09-06
description: A new server with privacy friendly Greenhost based in Amsterdam and the launch of the Pro plan!
categories: [updates]
---

This post will give a few more details regarding the server migration this morning and the launch of the new Pro plan on the site. Also the end of the open beta and what it means for existing users.

## Why the new server?

Since I started working on AnonAddy I've learnt a great deal more about Postfix and mail servers than I knew at the beginning. I've been testing improved configuration in the background for a few weeks now and decided that the best way to make the change would be to start from scratch and provision a new server.

The old server was with Vultr and was located in the United Kingdom which is not renowned for having great privacy. Vultr also does not (at the time of writing this) support TLSA records, which meant I could not enable DANE for the mail server unless I used a third party DNS provider.

I experimented for a while using Cloudflare's managed DNS and they did support all the DNS records I needed, however I don't like the centralisation of Cloudflare and didn't really want DNS queries passing through their servers.

Then I came across [Greenhost.net](https://greenhost.net) and really liked what I saw. They have a commitment to privacy by design and try to minimise the amount of personal information they store with regards to their customers.

Their servers are located in Amsterdam, Netherlands and run entirely on Dutch wind energy. They support all the DNS records I need and are able to manage the DNS records without the need to transfer the domain over to them. The support I've received so far has also been great!

## The launch of the Pro plan

A few users had voiced their concerns about the longevity of the service and asked how I was able to keep it running for free. The Pro plan will be how this service covers its operating costs, you can find details about pricing and features on the [home page](https://anonaddy.com) of this site.

I started the open beta to try to iron out any existing bugs and to make the service as stable as I could before officially launching.

Over the course of the beta I've fixed a fair few bugs and received lots a great feedback from users and have implemented many of the suggestions. I've also added some suggestions to my TO-DO list and will work on them over the coming weeks.

There will still be a generous Free plan that will allow you to create unlimited aliases and some UUID aliases. The Free plan will have a monthly bandwidth limit of 10MB, the average size of an email is around 75KB (about 7,000 words in plain text). This means that you will be able to receive around 137 emails per month before reaching your limit.

## A free 3 month Pro subscription for all beta testers

As a thank you for all the early beta testers I've added a 3 month Pro subscription to your accounts. You will be able to continue using the service exactly as you have been doing.

A couple of days before this Pro subscrition ends you will receive an email letting you know what steps you need to take if you don't wish to subscribe. After the subscription comes to an end your account will be reverted to the Free plan.


## Feedback and suggestions

If you have any feedback or suggestions please just drop me a line at [contact@anonaddy.com](mailto:contact@anonaddy.com) <span class="break-words text-sm">([5FCAFD8A67D2A783CFF4D0E31AC6D923E6FB4EF7](https://keys.openpgp.org/search?q=5FCAFD8A67D2A783CFF4D0E31AC6D923E6FB4EF7))</span> and sign up to the newsletter if you'd like to receive updates on new features!
