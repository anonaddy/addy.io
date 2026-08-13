---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/subscriptions/managing-duo-and-family-plan-members.png
section: content
title: Duo and Family plans
date: 2026-08-13
description: How Duo and Family plans work on addy.io. Share full Pro with 2 or 5 independent accounts, invite members by username, optionally share custom domains, and manage seats.
helpCategories: [subscriptions]
order: 5
---

**Duo** and **Family** let one person pay for **full Pro** on more than one addy.io account. Each member keeps their own independent account (aliases, recipients, usernames and settings are not shared by default). One owner manages a single subscription and invites others by username. The owner can also optionally share [custom domains](/help/adding-a-custom-domain/) so members can create their own aliases on a domain the household already uses.

See the [pricing section](/#pricing) on the home page for current prices, or the [blog post](/blog/introducing-duo-and-family-plans/) for an overview of the plans.

<h2 id="plan-sizes">Plan sizes</h2>

| Plan | Members (including the owner) | Who it suits |
|------|-------------------------------|--------------|
| **Duo** | 2 (you + 1) | Couples or two people who both want Pro |
| **Family** | 5 (you + 4) | Households or a small group you trust |

Every seat includes the full **Pro** feature set. You can pay with **card or PayPal** (monthly or yearly), or with **cryptocurrency** (yearly only). Duo and Family are not available through the [Apple App Store](/help/subscribing-through-the-apple-app-store/) or the [Google Play Store](/help/subscribing-through-the-google-play-store/).

<h2 id="how-to-subscribe">How to subscribe</h2>

1. [Log in](https://app.addy.io) and open the [subscription page](https://app.addy.io/settings/subscription).
2. Choose **Duo** or **Family**, and monthly or yearly billing.
3. Pay with **card or PayPal**, or (for yearly plans) **cryptocurrency**.
4. After payment succeeds, open the [family plan page](https://app.addy.io/settings/family-plan) to invite members.

For payment steps, see [Subscribing with a card or PayPal](/help/subscribing-with-a-card-or-paypal/) or [Subscribing with cryptocurrency](/help/subscribing-with-cryptocurrency/). To change payment method, upgrade, downgrade or cancel the owner's subscription later, see [Managing your subscription](/help/managing-your-subscription/).

<h2 id="independent-accounts">Independent accounts</h2>

Duo and Family are **not** a shared inbox. Each member has their own addy.io account and their own aliases, recipients, usernames and settings. The owner pays; members do not need their own paid subscription while they remain on the plan.

You can optionally share a custom domain (see [Sharing custom domains](#sharing-custom-domains)) so the household can use one brand or domain. Aliases created on that domain still belong to each member.

<h2 id="inviting-members">Inviting members</h2>

Only the **owner** can invite people. Members must already have an addy.io account before you can invite them.

1. Go to **Settings** > **Family Plan**, or open the [family plan page](https://app.addy.io/settings/family-plan) directly (also linked from the subscription page when you are an owner).
2. Under **Invite a member**, enter their addy.io **username**.
3. Click **Create invite**.

addy.io emails them an invitation. You also get a **shareable invite link** you can send yourself. Pending invites expire after **7 days**; you can **Revoke** an invite from the same page before it is accepted.

If the person you invite already has a **renewing paid subscription**, they must [cancel](/help/managing-your-subscription/#cancelling) it before they can accept. Once cancelled, any unused time on that subscription is **lost** and does not carry over to the family plan.

You cannot invite yourself, and you cannot invite more people than free seats allow (shown as **Using X of Y seats**).

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/subscriptions/managing-duo-and-family-plan-members.png" alt="Managing Duo and Family plan members" title="Managing Duo and Family plan members">
</div>

<h2 id="accepting-or-declining-an-invite">Accepting or declining an invite</h2>

1. Open the invite from the email, or use the shareable link the owner sent you.
2. Make sure you are logged in as the invited username.
3. If you have your own renewing paid subscription, cancel it first (unused time will not carry over).
4. Click **Accept invite** to join, or **Decline** to reject the invite.

While you remain a member, your account has full **Pro** access. You do not manage billing for the family plan; the owner does.

<h2 id="managing-members">Managing members</h2>

On the [family plan page](https://app.addy.io/settings/family-plan), the owner can see who is on the plan and how many seats are used.

- **Remove** - the owner can remove a member. That person loses Pro access and returns to the **Free** plan. Aliases they created on shared family domains keep working for **14 days**, then are deactivated.
- **Leave** - a member can leave the plan themselves. Their account also returns to the **Free** plan, with the same **14-day** window for aliases on shared family domains.
- **Cancel the owner's subscription** - when the Duo or Family subscription ends, the family plan is torn down. Remaining members lose Pro access and return to Free (unless they have another paid subscription of their own). Sharing on the owner's custom domains also ends, with the same **14-day** grace period for member aliases.

If you later subscribe again within the usual restore window, see [What happens if I have a subscription but then cancel it?](/faq/#what-happens-if-i-have-a-subscription-but-then-cancel-it) for how Free-plan downgrades and restores work on an individual account.

<h2 id="switching-plans">Switching plans</h2>

Owners on a card/PayPal subscription can change plan (for example Pro to Duo, or Duo to Family) through **Manage Current Subscription** on the [subscription page](https://app.addy.io/settings/subscription), the same way as other Stripe plan changes. See [Managing your subscription](/help/managing-your-subscription/). Seat limits update with the plan; if you move to fewer seats than you currently use, excess members may need to be removed.

<h2 id="sharing-custom-domains">Sharing custom domains</h2>

The owner can optionally share a [verified custom domain](/help/adding-a-custom-domain/) with Duo or Family members. Sharing is **off by default** and controlled **per domain** with a toggle. Members can then create **their own aliases** on that domain (for example `bank@yourdomain.com` on one account and `shop@yourdomain.com` on another) while each person's aliases, recipients and settings stay private.

This is useful when a couple or household already owns a domain and wants everyone to use addresses at that domain, without sharing a single addy.io inbox.

**What members get**

- Create and manage their own aliases on the shared domain
- Use their own recipients, labels and other alias settings

**What stays with the owner**

- DNS for the domain
- Catch-all and alias auto-create
- Domain settings (active, default recipient, description)
- The ability to turn sharing on or off

Members see shared domains as read-only on the **Domains** page (labelled **Shared by** the owner). The owner still controls DNS, so members should treat a shared custom domain differently from addy.io aliases.

<h3 id="how-to-share-a-custom-domain">How to share a custom domain</h3>

1. Subscribe to **Duo** or **Family** and [add and verify](/help/adding-a-custom-domain/) the domain if you have not already.
2. Go to **Domains** and click **Edit** on the verified domain.
3. Turn on the **Share with family** toggle.

The domain then shows as **Shared with family members**. Members can create aliases on it from the usual **Create Alias** flow. They can also see the list under **Settings** > **Family Plan** > **Shared custom domains**.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/subscriptions/custom-domain-share-with-family.png" alt="Share a custom domain with family members" title="Share a custom domain with family members">
</div>

<h3 id="how-to-stop-sharing-a-custom-domain">How to stop sharing a custom domain</h3>

1. Go to **Domains** > **Edit** on the domain.
2. Turn off the **Share with family** toggle.
3. Confirm **Stop sharing**.

Members cannot create new aliases on that domain immediately. Existing member aliases keep working for **14 days**, then are deactivated. The same 14-day window applies if a member leaves, is removed, or the family plan ends.

You cannot [delete the domain](/help/deleting-a-domain/) while family members still have aliases on it. Stop sharing first and wait for the grace period to end, or ask members to delete their aliases.

<h2 id="common-questions">Common questions</h2>

**Can members see each other's aliases?**
No. Accounts stay independent. Even on a shared custom domain, each member only sees the aliases they created.

**Can members share a custom domain?**
Yes. The owner can optionally share a verified custom domain with the plan. Sharing is off by default and controlled per domain. See [Sharing custom domains](#sharing-custom-domains).

**Can I invite someone who is still on Free?**
Yes. They only need an existing addy.io account. Free users can accept without cancelling anything.

**Can I pay with crypto or through the mobile apps?**
Crypto works for **yearly** Duo and Family plans - see [Subscribing with cryptocurrency](/help/subscribing-with-cryptocurrency/). Duo and Family are not available through the App Store or Play Store; use [card or PayPal](/help/subscribing-with-a-card-or-paypal/) or crypto on the web.

**Where do I manage seats after subscribing?**
**Settings** > **Family Plan**, or [app.addy.io/settings/family-plan](https://app.addy.io/settings/family-plan).
