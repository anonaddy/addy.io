---
pagination:
    collection: helpCategories
title: "Help Centre"
description: The list of all help articles for AnonAddy. You'll find information about using aliases, adding recipients and much more.
---

@extends('_layouts.help_centre')

@section('helpContent')
    <p>
        Welcome to the help centre. Select a category to see help articles for that topic.
    </p>
    <p class="mb-0">
        Below you can find definitions for common terms used throughout this site.
    </p>
    <div class="w-12 h-1 bg-indigo-900 my-8"></div>
    <h2 class="mt-0">
        Terminology
    </h2>
    <p>
        <b>Aliases</b> - Aliases or email aliases are email addresses that are associated with another destination email address. They are simply forwarding email addresses, in the case of AnonAddy all aliases created forward emails to your real recipient email addresses.
    </p>
    <p>
        <b>UUID Alias</b> - A UUID alias is generated at the parent domain e.g. anonaddy.me and look something like this - 94960540-f914-42e0-9c50-6faa7a385384@anonaddy.me. UUID stands for universally unique identifier, it is randomly generated string with no inherent logic (this applies to V4). Users who want maximum anonyminity may choose to use this kind of alias as it does not include your username or any other identifying information in the email address.
    </p>
    <p>
        <b>Standard Alias</b> - A standard alias on AnonAddy is any alias that is created automatically when it receives its first email. If you signed up with a username of johndoe and gave out the following alias - hello@johndoe.anonaddy.com then this would be a standard alias.
    </p>
    <p>
        <b>Recipients</b> - Your recipient email addresses are your real email addresses where aliases are forwarded to. You can set a default recipient for your account in your settings, this is where all aliases will forward emails if they have no other recipients attached. You can also set a default recipient for each custom domain and additional username.
    </p>
    <p>
        <b>Domains</b> - Domains or custom domains can be added to your account and used to create aliases. You need to own/control a domain name to be able to add it to AnonAddy. You can purchase domain names from registrars such as namesilo.com, namecheap.com or gandi.net.
    </p>
    <p>
        <b>Usernames</b> - On AnonAddy the term username can either reference the username that you signed up with or an additional username that you are able to add to compartmentalise your aliases. Usernames and additional usernames are unique across AnonAddy, they cannot be greater than 20 characters and can only contain letters and numbers.
    </p>
    <p>
        <b>Bandwidth</b> - This is the amount of data that can be transmitted in a fixed amount of time. On AnonAddy bandwidth is incremented each time an email is forwarded or a reply is sent (this is the data). Every calendar month (e.g. January, February etc.) your bandwidth is reset to 0. When an alias is deactivated or deleted emails sent to it do not count towards your bandwidth.
    </p>
    <p>
        <b>GPG/OpenPGP Key</b> - PGP (Pretty Good Privacy) is a public-key encryption program that has become the most popular standard for email encryption. You can add a public key to each recipient on AnonAddy. This public key is then used to encrypt all emails forwarded to that recipient. Only you will be able to decrypt these emails using the corresponding private key.
    </p>
    <p>
        <b>Fingerprint</b> - A PGP fingerprint is a shorter version of a public key. It is used as an easy way to identify public keys and veryify that they are correct.
    </p>
@stop