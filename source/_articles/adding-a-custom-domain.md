---
extends: _layouts.article
ogtype: article
image: https://anonaddy.com/assets/img/help-verify-domain-for-sending.png
section: content
title: Adding a custom domain
date: 2020-03-03
description: This article guides you through the steps to add a custom domain on AnonAddy. This allows you to receive and send email from your own domain through the service.
helpCategories: [domains]
---

This article guides you through the steps to add a custom domain on AnonAddy. This allows you to receive and send email from your own domain through the service.

## Verifying ownership of the domain

Before you can add you domain you must add a DNS TXT record to prove that you have control over the domain.

The TXT record will look something like the below:

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/help-add-domain.png" alt="Add custom domain" title="Add custom domain">
</div>

> **Note**: If you are adding a subdomain make sure to change the host from **@** to **mail** (e.g. if the subdomain was **mail**.example.com)

## Verifying records for sending from the domain

Now that the domain has been added you will need to add some more records to get it set up correctly.

Click on "Check records" as shown in the image below.

<div class="flex justify-center mb-6">
  <img class="shadow" src="/assets/img/help-domain-added.png" alt="Custom domain added" title="Custom domain added">
</div>

A modal will appear after clicking "Check records" that will have some other records you will need to add.

> **Note**: If you do not intend to use your domain for replying or sending from then you only need to add the **MX** record.

<div class="flex justify-center mb-6">
  <img class="shadow" src="/assets/img/help-verify-domain-for-sending.png" alt="Verify domain for sending" title="Verify domain for sending">
</div>

The SPF record authorises the AnonAddy server to send email on your behalf. The DMARC record informs cooperating mail servers what they should do with your email message if both SPF and DKIM checks fail.

The CNAME records point to AnonAddy DKIM (DomainKeys Identified Mail) keys. The reason there are two is so that we can easily rotate keys in the future for security reasons.

> **Note**: If you are adding a **subdomain** e.g. mail.example.com please change the host values to the following

For the MX record: from **@** to **mail**

For the TXT SPF record: from **@** to **mail**

For the first CNAME record: from **dk1._domainkey** to **dk1._domainkey.mail**

For the second CNAME record: from **dk2._domainkey** to **dk2._domainkey.mail**

For the TXT DMARC record: from **_dmarc** to **_dmarc.mail**

If you've added the records but it still isn't verifying please wait a little while, it is likely because the changes have not yet propagated.

You can check the records for your domain using [mxtoolbox.com](https://mxtoolbox.com)

Please leave these records in place for the duration that you use the domain on AnonAddy.

A daily check is carried out on the domain's records, if you remove any records then the domain will become unverified for sending. You will recieve an email notification to let you know if your domain has become unverified for sending and which record has caused it to happen.