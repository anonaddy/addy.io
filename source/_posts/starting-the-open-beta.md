---
extends: _layouts.post
section: content
title: Starting the open beta
date: 2019-07-17
description: Starting the open beta for AnonAddy, testing out the anonymous email forwarder.
categories: [updates]
---

The beta has been running for a couple of weeks or so now and the feedback received so far has been great! There have been a few new features added that I'll go over below. I've also moved this site over from Laravel to a static site generator called Jigsaw to make it faster to write blog posts in markdown.

## New GPG/OpenPGP encryption

I recently added the option to import your own public key for each recipient on the recipients page. Once you've imported your key you'll be able to toggle encryption on or off easily.

With encryption on all emails forwarded to that recipient will be encrypted with the public key you imported. Only you will be able to decrypt the contents of the email using the corresponding private key.

This could be a great option for people still using Google Mail, Microsoft Outlook etc. who are known to scan the contents of emails received.

All forwarded emails will also be signed using our mailer@anonaddy.me private key.

You can add our public key to your own keyring so that you can verify emails have come from us.

The fingerprint of the mailer@anonaddy.me key is "26A987650243B28802524E2F809FD0D502E2F695" you can find the key on [https://keys.openpgp.org](https://keys.openpgp.org/search?q=26A987650243B28802524E2F809FD0D502E2F695).

It works extremely well if you are using [Mozilla Thunderbird](https://www.thunderbird.net) with the [Enigmail](https://enigmail.net) Add-on.

You can also use a browser extension called [Mailvelope](https://www.mailvelope.com) if you are using the browser to view your email.

## Replace the subject of forwarded emails

This is a new feature that is mainly for those using encryption.

When encrypting an email the email subject cannot be encrypted as it is one of the headers. To prevent giving any clues on the contents of emails you can replace the subject with something generic such as "Email subject" or "Hello".

Then all forwarded emails will have the same generic subject line.

If you set a new subject to replace the original then the original will be added to the banner information inside the email body, for example:

This email was sent to alias@johndoe.anonaddy.com from sender@example.com with subject "This is the original email subject" and has been forwarded by AnonAddy.

## Multiple alias domains

You can now use either anonaddy.com or anonaddy.me as your domain for aliases.

So you can do alias@user.anonaddy.com or alias@user.anonaddy.me and both will work the same!

## Improving the security of the mail server

I've also been doing some work on improving the security of the mail server by enabling DANE, MTA-STS and improving the cipher preferences in Postfix.

This is on top of DNSSEC, TLSv1.3, DMARC, SPF, DKIM, CAA etc.

The server now gets all green lights on [hardenize.com](https://www.hardenize.com/).

## What's next?

I'm currently working on adding a "recipient mapping" feature that would allow you to choose which recipients to attach when you make up a new alias and it receives its first email. This would allow you to choose a recipient other than the default one instead of having to wait for it to be created and then changing the recipient.

It will likely work something like this:

alias+2@user.anonaddy.com where the extension of "2" will be the identifier for your second recipient in your account.

You will also be able to do alias+3,4@user.anonaddy.com so you can attach recipients "3" and "4" to the new alias.

After I've finished this I'll likely work on adding the ability to have multiple "usernames" under the same account which would allow you to do alias@dave.anonaddy.com or alias@john.anonaddy.com etc.

This will make it harder for others to link ownership of aliases together.

## Feedback and suggestions

If you have any feedback or suggestions please just drop me a line at [contact@anonaddy.com](mailto:contact@anonaddy.com) and sign up to the newsletter if you'd like to receive updates on new features!
