---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/forgetting-an-alias.png
section: content
title: Forgetting an alias
date: 2026-05-26
description: What it means to forget an alias on addy.io and when to use it. Forgetting permanently disassociates an alias from your account; shared domain aliases cannot be restored.
helpCategories: [aliases]
order: 7
---

**Forgetting** an alias permanently removes it from your account so it can no longer be restored. For [shared domain](/help/what-are-the-different-kinds-of-aliases/) aliases (e.g. @anonaddy.me), that address can never be used again by anyone. For [standard](/help/what-are-the-different-kinds-of-aliases/) aliases, the address may be created again later (e.g. on the fly if you have catch-all). This article explains when to forget an alias and how it differs from [deactivating](/help/deactivating-email-aliases/) or [deleting](/help/deleting-an-alias/).

<h2 id="when-to-forget-an-alias">When to forget an alias</h2>

Use **Forget** when you want to permanently give up an alias:

- You will never use it again and do not want it [restorable](/help/restoring-a-deleted-alias/).
- For shared domain aliases, forgetting frees the address from your account (it will reject mail and cannot be reassigned to you).
- For standard aliases, forgetting disassociates it now; with catch-all enabled, the same address could be created again automatically if someone emails it later.

If you only want to stop mail temporarily, use [Deactivate](/help/deactivating-email-aliases/). If you want it gone but might restore it later, use [Delete](/help/deleting-an-alias/) instead of Forget.

<h2 id="how-to-forget-an-alias-on-addy-io">How to forget an alias on addy.io</h2>

1. [Log in](https://app.addy.io) and go to **Aliases**.
2. Select the alias you want to forget by clicking the checkbox next to it. It can be active, [deactivated](/help/deactivating-email-aliases/), or [deleted](/help/deleting-an-alias/)-you can forget a deleted alias to make the removal permanent.
3. Click **Forget** (as shown by the red arrow below). Read the warning: forgetting cannot be undone if it is a shared domain alias.
4. Confirm. The alias is then permanently disassociated from your account.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/aliases/forgetting-an-alias.png" alt="Forget alias option in addy.io" title="Forgetting an alias">
</div>

<h2 id="difference-between-deleting-deactivating-and-forgetting">Difference between deleting, deactivating and forgetting</h2>

- **Deactivate** - Stops forwarding; mail is silently discarded; you can turn the alias back on. See [Deactivating email aliases](/help/deactivating-email-aliases/).
- **Delete** - Alias is removed and rejects mail; you can [restore](/help/restoring-a-deleted-alias/) it later. See [Deleting an alias](/help/deleting-an-alias/).
- **Forget** - Permanent. Alias is disassociated from your account. Shared domain aliases can never be restored or used again; standard aliases can potentially be recreated (e.g. via catch-all) as new aliases.
