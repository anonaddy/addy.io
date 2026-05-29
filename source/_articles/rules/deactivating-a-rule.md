---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/rules/deactivate-rule.png
section: content
title: Deactivating a rule
date: 2026-05-27
description: How to deactivate a rule on addy.io. Deactivating pauses the rule so its actions are not applied; you can reactivate it later without recreating it.
helpCategories: [rules]
order: 4
---

**Deactivating** a [rule](/help/terminology/#rules) pauses it: the rule’s conditions are no longer evaluated and its actions are not applied to incoming mail. The rule stays in your list so you can **reactivate** it later without re-entering conditions or actions. This is useful when you want to temporarily stop a rule (e.g. for testing or a short-term change) without [deleting](/help/deleting-a-rule/) it. This article explains how to deactivate and reactivate a rule.

<h2 id="how-to-deactivate-a-rule">How to deactivate a rule</h2>

1. [Log in](https://app.addy.io) and go to **Rules** in the navigation bar.
2. Find the rule you want to deactivate. Use the **Active** toggle for that rule (as shown in the red box below).
3. The rule is now inactive; incoming mail will not trigger its actions until you reactivate it.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/rules/deactivate-rule.png" alt="Deactivate rule option in addy.io" title="Deactivating a rule">
</div>

<h2 id="reactivating-a-rule">Reactivating a rule</h2>

Open **Rules**, find the same rule, and turn **Active** on using the toggle in the **Active** column. The rule will run again for incoming mail in its [order](/help/changing-the-order-that-your-rules-are-applied-in/).

<h2 id="deactivate-vs-delete">Deactivate vs delete</h2>

- **Deactivate** - The rule is paused but remains in your account. You can reactivate it at any time.
- **Delete** - The rule is permanently removed. You would need to [create a new rule](/help/creating-a-new-rule/) to get the same behaviour again. See [Deleting a rule](/help/deleting-a-rule/).
