---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/domains/adding-a-custom-domain.png
section: content
title: Adding a custom subdomain
date: 2026-05-27
description: How to add a custom subdomain (e.g. mail.example.com) on addy.io. Correct DNS host values for MX, TXT SPF, CNAME DKIM and DMARC for subdomains.
helpCategories: [domains]
order: 2
---

A **custom subdomain** (e.g. **mail.example.com** or **aliases.example.com**) is added the same way as a root (apex) [custom domain](/help/adding-a-custom-domain/), but you must use different **host** values in your DNS so the records apply to the subdomain. This article lists the host values for MX, SPF, DKIM (CNAME) and DMARC when adding a subdomain. Start by adding the domain in addy.io; the TXT record for ownership uses the subdomain as the host (e.g. **mysub** if the subdomain is **mysub.example.com**).

<h2 id="host-values-for-a-subdomain">Host values for a subdomain</h2>

> **Note**: If you are adding a **subdomain** (e.g. **mysub.example.com**), use the following host values instead of the root domain values

For the MX record: from **@** to **mysub**

For the TXT SPF record: from **@** to **mysub**

For the first CNAME record: from **dk1._domainkey** to **dk1._domainkey.mysub**

For the second CNAME record: from **dk2._domainkey** to **dk2._domainkey.mysub**

For the TXT DMARC record: from **_dmarc** to **_dmarc.mysub**

Replace **mysub** with your actual subdomain label (e.g. for **mail.example.com** use **mail**).

<h2 id="propagation-and-checking-records">Propagation and checking records</h2>

If you have added the records but the domain still is not verifying, wait for DNS propagation (from a few minutes to 48 hours depending on your provider). You can check that the records are visible using [mxtoolbox.com](https://mxtoolbox.com) or your registrar’s DNS checker.

Keep these records in place for as long as you use the domain on addy.io. A daily check is run on the domain’s records; if any record is removed or changed, the domain may become unverified for sending and you will receive an email notification explaining which record caused it.