---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/rules/rule-order.png
section: content
title: Changing the order that your rules are applied in
date: 2026-02-13
description: How to change the order in which addy.io rules run. Rule order matters because matching rules are evaluated top-to-bottom and can combine actions.
helpCategories: [rules]
order: 2
---

[Rules](/help/terminology/#rules) are applied to incoming mail in a fixed **order**. When an email is received, addy.io checks rules from top to bottom. More than one rule can match and apply actions, so sequence still matters when rules overlap (for example, one rule might change the subject and another might forward to a specific [recipient](/help/adding-a-recipient/)). This article explains how to change the order in which rules are applied.

<h2 id="where-to-change-rule-order">Where to change rule order</h2>

1. [Log in](https://app.addy.io) and go to **Rules** in the navigation bar.
2. You will see a list of your rules. Use **drag and drop** to reorder them by clicking the icon shown in the red box below. Changes are automatically saved.

<div class="flex justify-center my-8">
  <img class="shadow max-w-full h-auto" src="/assets/img/help/rules/rule-order.png" alt="Rule order list in addy.io" title="Changing rule order">
</div>

<h2 id="why-order-matters">Why order matters</h2>

If two rules could both match an email, order controls the sequence they are evaluated in and can affect the final result. Put the most specific or highest-priority rules higher in the list, especially for actions like **block**, **quarantine**, or **forward to** that can significantly change delivery. You can always [create](/help/creating-a-new-rule/), [deactivate](/help/deactivating-a-rule/) or [delete](/help/deleting-a-rule/) rules and adjust the order as your needs change.
