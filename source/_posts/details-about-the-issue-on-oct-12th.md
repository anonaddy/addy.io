---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/500-server-error.png
section: content
title: Details about the issue on Oct 12th
date: 2021-10-13
description: This is a short post with more details about the recent issue on the main mail server
categories: [updates]
---

This is a short post with more details about the recent issue on the main mail server.

## What happened?

At around 9:40 GMT an issue occurred with the DNS resolver on the main mail server which prevented it from being able to properly communicate with the database server.

## What was affected?

The main mail server was affected which also hosts the web application (app.addy.io) and this is why users were not able to login or use the API during this time.

The database server and backup mail server were not affected. The backup mail server continued to deliver messages as normal.

## Were emails lost?

The error caused the main mail server to respond to attempted deliveries with the following message:

`NOQUEUE: reject: 451 4.3.0 Temporary lookup failure;`

This will have informed the any mail servers attempting to deliver messages to try again later and to add the message to their deferred mail queue.

As such, emails will have been delayed but should still have been delivered as normal once the issue was fixed.

## Why didn't the status page reflect the error?

The uptime monitor was still able to reach the web application and receive a 200 OK response even though a 500 error page was being displayed by Laravel (screenshot below). This meant it did not show that there was any problem at [status.addy.io](https://status.addy.io/).

<div class="flex justify-center mb-4">
  <img class="shadow" src="/assets/img/500-server-error.png" alt="500 server error" title="500 server error">
</div>

I have now updated the settings for the uptime monitor to ensure the status page accurately reflects the real status of the web application.

I am still investigating exactly what triggered this issue and working to implement measures to ensure it won't happen again. As always I will keep you updated with any changes and improvements made to addy.io and apologise for any inconvenience caused by this.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
