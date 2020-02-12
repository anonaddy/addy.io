---
extends: _layouts.post
ogtype: article
image: https://anonaddy.com/assets/img/send-from-alias.png
section: content
title: Sending email from an alias and updated replies
date: 2020-02-12
description: This post gives some more details on the new send from an alias feature and how it works. It also covers the updated email reply functionality which works in the same way. The daily reply limits will now include both replies and send froms.
categories: [updates]
---

This post gives some more details on the new send from an alias feature and how it works. It also covers the updated email reply functionality which works in the same way. The daily reply limits will now include both replies and send froms.

## The new send from feature

This has probably been one of the most requested features on AnonAddy since I launched the site. The ability to send an email from an alias and initiate an email conversation without having to be forwarded one first.

I took inspiration for this feature from the way VERP (Variable Envelope Return Path) works. When VERP is enabled each recipient has a different return path (also referred to as "envelope sender"). For example an email sent to recipient@example.com would have a return path like this mailer+recipient=example.com@anonaddy.me.

Notice that the + extension has the recipient's email address with an '=' symbol instead of the '@'. This technique allows senders to automatically handle emails that bonce by analysing the return path to retrieve the recipient's email (in this case recipient@example.com). This email address can then be added to a suppression list if it is a hard bounce (e.g. email address does not exist) to prevent any further sending attempts.

## An example of how it works

Let's say that you have the alias **first@johndoe.anonaddy.com** and you want to send an email to **hello@example.com**.

All you need to do is enter the following in the To: field.

<span class="break-words"><first+hello=example.com@johndoe.anonaddy.com></span>

> **Note**: you must send the email from a verified recipient on your account.

Then send the email exactly as you would any other. To check that the email has sent successfully, look in your dashboard at the sent count column and see if it has been incremented for that alias.

This works exactly the same for UUID/Random Word aliases, additional usernames and custom domains.

You can even use the send from feature to create an alias on the fly that does not yet exist. This only works for standard aliases or those at custom domains that behave as a catch-all.

You must generate aliases that use shared domains (e.g. circus.waltz449@anonaddy.me) beforehand in order to be able to send from them.

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/send-from-alias.png" alt="Send from alias" title="Send from alias">
</div>

## Updating the way email replies work

Email replies have definitely been the thing that have caused the most confusion on AnonAddy so far, this is partly due to the fact that I don't think I've explained them very well and partly because of the confusing "hash" value used.

I've decided to update the way that email replies work to function in the same way as the above send from feature.

Each forwarded email will have a Reply-To: header set. This header will look something like this:

Reply-To: <<span class="break-words"><alias+hello=example.com@johndoe.anonaddy.com></span>>

Where **hello@example.com** is the sender of the forwarded email that you will be replying to.

Almost all mail clients respect the Reply-To: header, so all you need to do is click reply and it should automatically fill the To: field with the correct address.

Some users have reported that Gmail's web mail has not been using the Reply-To header. If this is the case then you will have to manually copy the value of the Reply-To header and use this instead.

To check if a reply has worked properly check in your dashboard if the reply count has been incremented for that alias.

## Combining reply and send from limits

I initially considered keeping the daily reply and send from limits separate but have decided to combine them to simplify things.

The current daily reply limit on the Lite plan is 20 and on the Pro plan 100. Going forward you will be able to mix and match replies/send froms for this limit.

For example on the Lite plan you could do 20 replies in one day and 0 send froms. Or 10 replies and 10 send froms. Or 0 replies and 20 send froms etc.

If you reach your daily limit you will receive an email letting you know.

## Feedback and suggestions

If you have any feedback or suggestions please just drop me a line at [contact@anonaddy.com](mailto:contact@anonaddy.com) <span class="break-words text-sm">([5FCAFD8A67D2A783CFF4D0E31AC6D923E6FB4EF7](https://keys.openpgp.org/search?q=5FCAFD8A67D2A783CFF4D0E31AC6D923E6FB4EF7))</span> and sign up to the newsletter if you'd like to receive updates on new features!
