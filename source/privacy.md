---
title: "Privacy Policy"
extends: _layouts.master
section: body
description: This policy (together with our Terms and Conditions) sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us.
---

<h1 class="w-full text-center">Privacy Policy</h1>
<div class="w-full mt-4 mb-12">
  <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
</div>

<p class="text-sm text-grey-400 mb-4">Last Updated: 30th April 2021</p>

This policy (together with our Terms and Conditions) sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us. It applies to anonaddy.com and any subdomains e.g. app.anonaddy.com.

In order to ensure confidentiality and lawful processing of its, Visitors personal data, AnonAddy in its capacity of a data controller and of a processor, conducts its activities in strict compliance with the requirements set in GDPR - Regulation (EU) 2016/679 of the European Parliament and of the Council on the protection of natural persons with regard to the processing of personal data and on the free movement of this data.

## Information We May Collect From You

We may collect the following data from you:

* Information that you provide by filling in forms on our site. This includes information provided at the time of registering to use our site or subscribing to our service.
* If you contact us, we may keep a record of that correspondence.
* For keeping track of authenticated sessions we use a small number of cookies. This site does not provide any third party cookies and makes no effort to track you. You can delete stored cookies from your browser whenever you wish.
* If you start a subscription we may ask you to provide us with information such as your name and payment information. Your name and card details will not be stored in our database.

Our site does not store/save any emails that are forwarded or replied to through the service. You can check the source code to see what happens when an email is piped to our application by Postfix.

Our server uses Postfix as the mail server software and Nginx as the web server. Nginx access and error logs are kept which do record IP addresses. Default log settings are used for Postfix. All log files are rotated daily and retained for 3 days, old log files are deleted.

Server logs are only used to improve our service and prevent abuse or prohibited use. This information will not be provided under any circumstances to any parties other than when compelled by law.

## How We Use Your Personal Information

We use information held about you for the following purposes:

* To notify you about any changes to the service.
* To forward emails to the recipient addresses you have added to the site.

## Protection Of Personal Information

We will never misuse, sell, rent, share or give away any personal information to any third parties.

Our website is open-source and available for anyone (who understands PHP) to view and audit. We do not use Google Analytics or any other analytics/tracking (unless you count server logs mentioned above) on our site.

## Security

All information you provide to us is stored on our secure servers in the Netherlands (UpCloud). Sensitive data in our database such as your recipient email addresses, alias descriptions, public GPG keys are encrypted using OpenSSL and the AES-256-CBC cipher. Furthermore, all encrypted values are signed with a message authentication code (MAC) to detect any modifications to the encrypted string. Two Factor Authentication (2FA) is also available on our site and we encourage users to enable it.

Opportunistic DANE TLS encryption with strong cipher preference is used for all emails sent through our service. Our mail server also utilises STARTTLS, PFS, DNSSEC, MTA-STS, TLS-RPT, DMARC, SPF and DKIM. These measures help to protect emails sent to/from our server against MiTM (Man in The Middle) downgrade attacks and also against the risk of email forgery.

Our site also uses security features such as; HSTS (HTTP Strict Transport Security), a strict CSP (Content Security Policy), Subresource Integrity, Expect CT and XSS Protection.

You may use this service to forward emails containing sensitive information such as bank or cryptocurrency information, we do our best to make sure any email is not lost but this cannot be guarenteed.

We take all measures reasonably necessary to protect against unauthorised access, use, alteration or destruction of data.

## Your Rights

You have the right to request access to personal data that we may process about you.

You have the right to require us to correct any inaccuracies in your data, free of charge. You can access, correct, update or request deletion of your personal information at any time, either through your online account or by contacting us.

## Third party services

The only third party service that we use is [Stripe](https://stripe.com) to process payments for subscriptions. Any payment transactions will be carried out by Stripe over encrypted connections hosted within an iframe served from Stripe’s domain. Your card information never touches our server.

## Changes To Our Privacy Policy

Any changes we may make to our privacy policy in the future will be posted on this page and, where appropriate, notified to you by e-mail. However, we advise that you check this page regularly to keep up to date with any necessary changes.

## Contact

Questions, comments and requests regarding this privacy policy are welcomed and should be directed to the Data Protection Officer [contact@anonaddy.com](mailto:contact@anonaddy.com) ([GPG Key](/anonaddy-contact-public-key.asc))
