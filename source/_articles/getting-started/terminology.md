---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/getting-started/mobile-app-login.png
section: content
title: Terminology
date: 2026-04-24
description: Definitions for common terms used throughout addy.io, including aliases, recipients, domains, and more.
helpCategories: [getting-started]
order: 1
---

This article provides definitions for common terms used throughout addy.io.

<h3 id="aliases">Aliases</h3>

Aliases or email aliases are email addresses that are associated with another destination email address. They are simply forwarding email addresses, in the case of addy.io all aliases created forward emails to your real recipient email addresses.

<h3 id="standard-alias">Standard Alias</h3>

A standard alias on addy.io is any alias that has a domain name that is unique to you (can only be used by you). For example if you registered an account with a username of johndoe and gave out the following alias - hello@**johndoe**.anonaddy.com then this would be a standard alias. Any aliases at any of your own custom domains are also standard aliases e.g. hello@**yourdomain.com**. Since these aliases have domain's only used by you they can be created automatically via catch-all when they receive their first email.

<h3 id="shared-domain-alias">Shared Domain Alias</h3>

A shared domain alias is any alias that has a domain name that is also shared with other users. For example anyone can generate an alias with the @anonaddy.me domain. Aliases with shared domain names must be pre-generated and cannot be created on-the-fly like standard aliases.

<h3 id="alias-format">Alias Format</h3>

Aliases can be created with different formats, the format of an alias changes the local-part (everything left of the @ symbol in an email address). Here are some examples of different alias formats:

- **Random Characters** - x481n904@anonaddy.me
- **Random Words** - circus.waltz449@anonaddy.me
- **Random Noun** - lush-paint987@anonaddy.me
- **Random Male Name** - leonard_turner107@anonaddy.me
- **Random Female Name** - leona-jensen781@anonaddy.me
- **Custom** - facebook.8an2k@anonaddy.me
- **UUID** - 94960540-f914-42e0-9c50-6faa7a385384@anonaddy.me

When choosing the custom format for a standard alias you can enter any valid local-part that you like, for example **anything@johndoe.anonaddy.com**.

<h3 id="deactivated-alias">Deactivated Alias</h3>

When an alias is deactivated, any messages sent to it will be **silently discarded**. The sender will not be notified of the unsuccessful delivery.

<h3 id="deleted-alias">Deleted Alias</h3>

When an alias is deleted, any messages sent to it **will be rejected** with the message "550 5.1.1 Recipient address rejected: Address does not exist". Deleted Aliases can be restored.

<h3 id="forgotten-alias">Forgotten Alias</h3>

When an alias is forgotten it is completely disassociated from your account.

If the alias is a shared domain alias (e.g. @anonaddy.me) then it can **never be restored or used again**. Once a shared domain alias is forgotten, it **will reject** any emails sent to it with the same message as above.

If the alias is a standard alias then it **can be created again in the future** since it will be as if it never existed in the database. Once a standard alias is forgotten, if someone sends an email to it and you have **catch-all enabled** then it will be created automatically again. If you would like the alias to reject any messages sent to it then you should **delete it** or **disable catch-all** for that username/domain.

<h3 id="recipients">Recipients</h3>

Your recipient email addresses are your real email addresses where aliases are forwarded to. You can set a default recipient for your account in your settings, this is where all aliases will forward emails if they have no other recipients attached. You can also set a default recipient for each custom domain and additional username.

<h3 id="domains">Domains</h3>

Custom domains can be added to your account and used to create aliases. You need to own/control a domain name to be able to add it to addy.io. You can purchase domain names from registrars such as namesilo.com, namecheap.com or gandi.net.

<h3 id="usernames">Usernames</h3>

On addy.io the term username can either reference the username that you signed up with or an additional username that you are able to add to compartmentalise your aliases. Usernames and additional usernames are unique across addy.io, they cannot be greater than 20 characters and can only contain letters and numbers.

<h3 id="catch-all">Catch-all</h3>

When catch-all is enabled for a username or custom domain, any email sent to an address at that domain will create that alias automatically when it receives its first message. You do not need to pre-create the alias. If catch-all is disabled, only addresses for aliases that already exist will be accepted; all others will be rejected. Catch-all can be turned on or off per username and per custom domain.

<h3 id="alias-local-part">Alias local-part</h3>

The local-part is the part of an email address before the @ symbol (for example, in **hello**@johndoe.anonaddy.com the local-part is "**hello**"). On addy.io it controls how your alias address looks. For shared domain aliases you choose a format (e.g. random characters, random words, custom, UUID); for standard aliases with the custom format you can type any valid local-part you want.

<h3 id="bandwidth">Bandwidth</h3>

This is the amount of data that can be transmitted in a fixed amount of time. On addy.io bandwidth is incremented each time an email is forwarded or a reply is sent (this is the data). Every calendar month (e.g. January, February etc.) your bandwidth is reset to 0. When an alias is deactivated or deleted emails sent to it do not count towards your bandwidth.

<h3 id="gpg-openpgp-key">GPG/OpenPGP Key</h3>

PGP (Pretty Good Privacy) is a public-key encryption program that has become the most popular standard for email encryption. You can add a public key to each recipient on addy.io. This public key is then used to encrypt all emails forwarded to that recipient. Only you will be able to decrypt these emails using the corresponding private key.

<h3 id="fingerprint">Fingerprint</h3>

A PGP fingerprint is a shorter version of a public key. It is used as an easy way to identify public keys and verify that they are correct.

<h3 id="rules">Rules</h3>

Rules let you automate what happens to incoming mail. You define conditions (e.g. sender, subject, alias) and actions (e.g. block email, disable encryption, move to a specific recipient). When an email matches a rule’s conditions, the rule’s actions are applied before the message is forwarded.

<h3 id="failed-deliveries">Failed Deliveries</h3>

A failed delivery is when an email sent to one of your aliases cannot be delivered to your recipient (e.g. the recipient mailbox is full, the address is invalid, or the receiving server rejects it). addy.io records these so you can see them in your account and fix the issue (such as updating the recipient address or checking the destination mailbox).

<h3 id="display-name-from-name">Display name (From name)</h3>

The display name is the name that appears in the "From" field when you send or reply from an alias (e.g. "John Smith" in John Smith "alias@example.com"). You can set a different display name for each alias so recipients see a friendly or descriptive name instead of only the alias address.
