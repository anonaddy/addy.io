---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/domains/delete-domain.png
section: content
title: Deleting a domain
date: 2026-05-27
description: How to delete a custom domain from your addy.io account. What happens to its aliases and what to do before you delete, including DNS records.
helpCategories: [domains]
order: 7
---

**Deleting** a [custom domain](/help/adding-a-custom-domain/) removes it from your addy.io account. All aliases at that domain (e.g. *@yourdomain.com) will be removed and will no longer work. The domain may later be added again. This article explains what to do before deleting and how to delete a domain.

<h2 id="before-you-delete-a-domain">Before you delete a domain</h2>

- **Aliases at this domain** - All aliases that use this domain will be removed and stop working. If you need to keep using any of those addresses, consider [deactivating](/help/deactivating-a-domain/) the domain instead (mail is discarded but you can reactivate), or [deactivating](/help/deactivating-email-aliases/) or [deleting](/help/deleting-an-alias/) individual aliases. You cannot "move" a domain's aliases to another domain; you would need to recreate aliases elsewhere.
- **Default recipient** - If this domain had a [default recipient](/help/changing-the-default-recipient-for-a-domain/) set, it is only used for that domain; deleting the domain does not affect your account’s [global default recipient](/help/changing-the-default-recipient-on-your-account/). No need to change it for deletion.
- **DNS records** - After deletion, you can remove the MX, SPF, DKIM (CNAME) and DMARC records for this domain from your DNS if you no longer use it for email. Leaving them in place does not cause problems but may point to addy.io for a domain you no longer use there.

<h2 id="how-to-delete-a-domain">How to delete a domain</h2>

1. [Log in](https://app.addy.io) and go to **Domains** in the navigation bar.
2. Find the domain you want to remove and click "Delete" on the right-hand side of the table (as shown in the red box below).
3. Confirm by clicking **Delete domain**. The domain and its aliases are removed from your account.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/domains/delete-domain.png" alt="Delete domain option in addy.io" title="Deleting a domain">
</div>

After deletion, you can add the same domain again later if it is still under your control. You cannot restore a deleted domain or its aliases. If you only want to stop receiving mail temporarily, use [Deactivating a domain](/help/deactivating-a-domain/) instead.
