---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/view-all-aliases.png
section: content
title: What are the different kinds of aliases?
date: 2026-10-15
description: Learn the difference between standard aliases and shared domain aliases on addy.io. Understand which aliases can be created on the fly and which must be generated first.
helpCategories: [aliases]
order: 1
---

addy.io supports different types of email aliases depending on the domain. The two main kinds are **standard aliases** (unique to you) and **shared domain aliases** (on a domain used by many users). This article explains what each type is and how they behave. For formats like random characters or random words, see [Terminology](/help/terminology/).

<h2 id="what-is-an-email-alias">What is an email alias?</h2>

An **email alias** is an address that forwards mail to another address-in addy.io's case, to one or more [recipients](/help/adding-a-recipient/) you have added. When someone emails your alias, addy.io receives it and forwards it to your real inbox. You can [reply](/help/replying-to-email-using-an-alias/) or [send](/help/sending-email-from-an-alias/) from the alias so the other person sees the alias address, not your real one.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/view-all-aliases.png" alt="View all aliases" title="View all aliases">
</div>

<h2 id="standard-aliases">Standard aliases</h2>

A **standard alias** uses a domain that belongs only to you. Examples:

- **Your username subdomain** - e.g. **hello@johndoe.anonaddy.com** or **hello@johndoe.anonaddy.me** (where **johndoe** is your username).
- **Your custom domain** - e.g. **newsletter@yourdomain.com** after you have [added a custom domain](/help/adding-a-custom-domain/).
- **An additional username’s subdomain** - e.g. **shop@janedoe.anonaddy.com** if you have added [additional usernames](/help/adding-an-additional-username/).

Because the domain is unique to you, standard aliases can be **created on the fly**: as soon as the first email is sent to that address, addy.io creates the alias and forwards the message. You do not need to generate them in the dashboard first. This behaviour is called **catch-all**. You can also create them in advance via [Creating new email aliases](/help/creating-new-email-aliases/) (**Create Alias** on the website), the [browser extension](/help/installing-the-browser-extension/) or [mobile app](/help/downloading-and-using-the-mobile-app/).

On Lite and Pro, **Settings** > **General** > **Random Characters on Custom Aliases** can add a short random suffix when you create a **Custom** standard alias in advance. It is off by default, so the local part stays exactly as you type it. With it on, choose a length from 1 to 10 and whether the suffix is letters, numbers, or both. The characters are added after your alias separator: typing **shop** can create **shop.k3mxp**. Addresses you give out for catch-all stay exactly as written. Shared domain custom aliases always add 5 letters and numbers, and this setting does not change that. See [Creating new email aliases](/help/creating-new-email-aliases/#random-characters-on-custom-aliases).

<h2 id="shared-domain-aliases">Shared domain aliases</h2>

A **shared domain alias** uses a domain that many addy.io users share. The most common example is **@anonaddy.me** (e.g. **circus.waltz449@anonaddy.me**). Other shared domains are available depending on your plan.

Because the domain is shared, these aliases **must be generated before use**. You cannot create them on the fly by giving out an address; you must use **Create Alias** on the website, the browser extension, mobile app or the [API](https://app.addy.io/docs). Once it exists, you can give it out and receive mail. Shared domain aliases often use **random character** or **random word** formats so they are hard to guess and not tied to your username.

There is usually a limit on how many shared domain aliases you can have; aliases at your own username subdomain or custom domain do not count toward that limit.<span data-pricing> See the [pricing page](/pricing/) for more details.</span>
