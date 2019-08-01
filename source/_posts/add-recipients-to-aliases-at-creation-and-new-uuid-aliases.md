---
extends: _layouts.post
section: content
title: Add recipients to aliases at creation and new UUID aliases
date: 2019-08-01
description: Some more updates for AnonAddy, you can now add recipients to aliases on the fly as they are created.
categories: [updates]
---

Just a quick update on a couple of new features I've added to the site. These features were added on the back of requests from users so if you have any other suggestions please just send me a message and let me know!

## Add recipients to aliases at creation time

This feature allows you to give out aliases with an extension that maps to keys for your available recipients. For example:

**alias+2.3.4@user.anonaddy.com** where 2,3 and 4 are keys that map to your recipients (separated by periods "."). You can find the key for each recipient on the recipients page when you are logged in.

The above example would add the three recipients to the new alias and immediately forward the email to each of them.

If you wanted to just attach one recipient you would simply do alias+5@user.anonaddy.com or alias+5@user.anonaddy.me.

You can always update the recipients for the alias after it has been created by going to your dashboard.

This feature allows you to forward the email to a recipient other than the default one if you need to.

The recipients are only added to the alias when it is first created. You cannot later do alias+7.8@user.anonaddy.com and change them. You would have to do this from your dashboard if you wanted to update the recipients.

If an email is later sent to an alias created with an extension but does not include the extension e.g. just alias@user.anonaddy.com it will still be forwarded correctly as the recipients are already attached to it.

Note that the keys for recipients are simply incrementing numbers with the oldest recipient having a key of 1 and so on.

If you delete a recipient the keys for other recipients may change.

## New UUID pre-generated aliases

Another feature that was requested was the ability to create aliases that do not give away the username of the alias owner.

These aliases must be pre-generated from your dashboard as they will be at the root domain anonaddy.me and not your username subdomain e.g. user.anonaddy.me.

They are generated using a universally unique identifier (UUID) and will look like this:

**94960540-f914-42e0-9c50-6faa7a385384@anonaddy.me**

As you can see the alias can no longer be linked to a particular user and could belong to anyone.

Since the alias does not give any information away about what it is used for, I highly recommend using a password manager such as [BitWarden](https://bitwarden.com/) to save the alias or add a description in the dashboard so you remember what it is for.

## Feedback and suggestions

If you have any feedback or suggestions please just drop me a line at [contact@anonaddy.com](mailto:contact@anonaddy.com) and sign up to the newsletter if you'd like to receive updates on new features!
