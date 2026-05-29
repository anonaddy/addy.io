---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/create-new-alias.png
section: content
title: Creating new email aliases
date: 2026-05-28
description: How to create email aliases on addy.io. Use standard aliases on the fly with catch-all, or generate random and shared-domain aliases from the dashboard, extension, mobile app, or API.
helpCategories: [aliases]
order: 2
---

You can create addy.io [aliases](/help/what-are-the-different-kinds-of-aliases/) in two main ways: **on the fly** (give out an address and let the first email create it) or **in advance** (generate the alias in the dashboard, [browser extension](/help/installing-the-browser-extension/), [mobile app](/help/downloading-and-using-the-mobile-app/), or [API](https://app.addy.io/docs)). Which method applies depends on the domain. For a gentle first walkthrough, see [Creating and testing your first alias](/help/creating-and-testing-your-first-alias/).

<h2 id="standard-vs-shared-domain-quick-reference">Standard vs shared domain (quick reference)</h2>

| | **Standard alias** | **Shared domain alias** |
|---|-------------------|-------------------------|
| Domain | Your username subdomain, [additional username](/help/adding-an-additional-username/), or [custom domain](/help/adding-a-custom-domain/) | e.g. `@anonaddy.me` (many users share the domain) |
| On the fly | Yes, when [catch-all](/help/understanding-catch-all-and-alias-auto-create-regex-for-a-username/) is enabled (default) | **No** - must be created first |
| Counts toward active shared-domain limit | No | Yes |

---

<h2 id="option-1-create-standard-aliases-on-the-fly">Option 1: Create standard aliases on the fly</h2>

For [standard aliases](/help/what-are-the-different-kinds-of-aliases/), you do not need to open the create dialog first. Make up an address on **your** domain and use it wherever you would normally enter your email.

1. Choose a local part (the part before `@`). For example, when signing up to example.com with username **johndoe**, you might use **`example@johndoe.anonaddy.com`** or **`example@johndoe.anonaddy.me`**.
2. Enter that address on the website, newsletter, or app.
3. When the **first email** is sent to that address, addy.io creates the alias automatically and forwards the message to your [recipient](/help/adding-a-recipient/) (or recipients).

The alias then appears under **Aliases** in the dashboard, usually with the description **Created automatically by catch-all**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/new-alias.png" alt="New alias listed in the addy.io Aliases page after the first forwarded email" title="Alias created on the fly">
</div>

This works the same way for [custom domains](/help/adding-a-custom-domain/) and [additional usernames](/help/adding-an-additional-username/): the alias is created when it receives its first email, as long as **catch-all** is enabled for that username or domain.

<h3 id="when-on-the-fly-creation-does-not-work">When on-the-fly creation does not work</h3>

- **Shared domains** (e.g. `@anonaddy.me`) - you must use [Option 2](#option-2-create-an-alias-in-the-dashboard) below. Giving out a random `@anonaddy.me` address that was never generated will not work.
- **Catch-all disabled** - mail to unknown local parts on that username or domain is rejected unless you use [alias auto create regex](/help/understanding-catch-all-and-alias-auto-create-regex-for-a-username/) (paid plans; catch-all must be off while regex is in use).
- **Hourly limits** - very large numbers of new aliases in a short time may hit your plan’s hourly creation limit. See [pricing](/#pricing) if you need higher limits.

If an alias receives spam, you can [deactivate](/help/deactivating-email-aliases/) or [delete](/help/deleting-an-alias/) it. You can also [forget](/help/forgetting-an-alias/) a standard alias so the address can be used again later (behaviour differs for shared domains).

---

<h2 id="option-2-create-an-alias-in-the-dashboard">Option 2: Create an alias in the dashboard</h2>

Use this for **all shared-domain aliases** and whenever you want a specific format (random characters, UUID, random words, and so on) before you give the address out.

<h3 id="open-the-create-dialog">Open the create dialog</h3>

1. [Log in](https://app.addy.io) and go to **Aliases**.
2. Click **Create Alias** (top of the page).
3. The **Create new alias** dialog opens. The intro notes that addresses on your username subdomain can still be created automatically on first email; this dialog is for generating an alias up front.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/create-new-alias.png" alt="Create new alias dialog with Alias Domain, Alias Format, Description, and Recipients fields" title="Create new alias">
</div>

<h3 id="choose-options">Choose options</h3>

| Field | What to set |
|-------|-------------|
| **Alias Domain** | The domain for the new alias (username subdomain, custom domain, or shared domain such as `anonaddy.me`). |
| **Alias Format** | How the local part is generated - see [Alias formats](#alias-formats) below. |
| **Alias Local Part** | Shown only when format is **Custom** - your chosen local part (rules apply on shared domains). |
| **Description** | Optional but recommended (max 200 characters), especially for random aliases so you remember what each one is for. |
| **Recipients** | Optional - up to **10** verified [recipients](/help/adding-a-recipient/). Leave empty to use your account [default recipient](/help/changing-the-default-recipient-on-your-account/). |

4. Click **Create Alias**.

If you have reached your **shared-domain alias limit** on a free or Lite plan, the button may show **Subscribe To Add More** or **Upgrade To Add More** instead - see [pricing](/#pricing).

<h3 id="your-new-address">Your new address</h3>

A **Your New Alias is:** dialog shows the full address. Use **Copy**, then give that alias out. Examples:

- UUID format: `86064c92-da41-443e-a2bf-5a7b0247842f@anonaddy.me`
- Random words: `circus.waltz449@anonaddy.me`
- Random characters on your subdomain: `x481n904@johndoe.anonaddy.com`

Shared-domain aliases are useful when you do not want your **username** in the address, so sites cannot easily link aliases together.

> **Note:** Random-character, UUID, random-word, and other generated aliases on **your own** username subdomain or custom domain do **not** count toward your shared-domain alias limit. Only aliases on shared domains count.

You can [change recipients](/help/changing-the-recipients-for-an-alias/) for the alias later if needed.

<h3 id="alias-formats">Alias formats</h3>

| Format | Typical use | Plan |
|--------|-------------|------|
| **Random Characters** | Default; short random local part | All plans |
| **UUID** | Long unique id as local part | All plans |
| **Custom** | You choose the local part (e.g. `newsletter`) | All plans on standard domains; shared domains require a subscription for custom |
| **Random Words** | e.g. `circus.waltz449` | Paid |
| **Random Male Name** / **Random Female Name** / **Random Noun** | Human-readable random local parts | Paid |

On a **shared domain**, free plans are limited to **Random Characters** and **UUID** (and **Random Words** where enabled). **Custom** local parts on shared domains require a paid plan; addy.io appends extra random characters to reduce guessing. Defaults for domain and format can be set under **Settings** > **General** (**Update Default Alias Domain** / **Update Default Alias Format**) - these apply on the website and in the [browser extension](/help/installing-the-browser-extension/).

---

<h2 id="browser-extension-mobile-app-and-api">Browser extension, mobile app, and API</h2>

The [browser extension](/help/installing-the-browser-extension/) and [mobile app](/help/downloading-and-using-the-mobile-app/) create aliases using the same rules as the dashboard. Connect them with an [API key](/help/api-settings/) from **Settings** > **API**.

To automate creation, use **`POST /api/v1/aliases`** with `domain`, `format`, optional `local_part` (for custom), `description`, and optional `recipient_ids`. Full details: [API documentation](https://app.addy.io/docs).

---

<h2 id="what-next">What next?</h2>

- [Sort and filter](/help/sorting-and-filtering-your-aliases/) aliases as your list grows.
- [Deactivate](/help/deactivating-email-aliases/) aliases you want to pause without deleting.
- Learn [what happens when you delete or forget](/help/deleting-an-alias/) an alias - especially on shared domains.
