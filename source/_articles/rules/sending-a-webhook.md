---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/rules/rule-webhooks.png
section: content
title: Sending a webhook
date: 2026-10-07
description: How to send a webhook when an addy.io alias receives email. Choose a public https URL, optionally include the message body, and verify the signed JSON payload. Includes a Zapier example that adds a spreadsheet row.
helpCategories: [rules]
order: 6
---

A **webhook** rule action sends an HTTPS POST to a URL you choose when a matching email is accepted. Use it to notify your own app, a form, or an automation tool such as Zapier. This article explains how to add the action, what addy.io sends, how to add a spreadsheet row, and how to check that the request came from addy.io.

<h2 id="add-a-webhook-action">Add a webhook action</h2>

1. [Log in](https://app.addy.io) and go to **Rules**.
2. [Create a rule](/help/creating-a-new-rule/) or edit an existing one.
3. Set the conditions that should match (for example the alias, sender, or subject).
4. Under **Actions**, choose **send a webhook to**.
5. Enter a public `https` URL. addy.io rejects `http` URLs, and it rejects hosts that point at a private or local address.
6. Select **Include the message body** if you want the plain-text and HTML body. Leave it unselected to receive details only.
7. Select **Include the headers** if you want the message headers. Leave it unselected to leave them out.
8. Choose whether the rule applies to **Forwards**, **Replies**, and/or **Sends**, then save.

A rule can have one webhook action. You can use more than one rule if you need more than one URL.

<h2 id="when-the-webhook-is-sent">When the webhook is sent</h2>

addy.io sends the webhook after the email is accepted. A rule that **blocks** or **quarantines** the email does not send a webhook.

One inbound email sends one POST to each distinct URL, even when the alias forwards to more than one recipient. If two matching rules use the same URL and either one includes the message body, the POST includes the body. The same rule applies to the headers.

addy.io does not follow redirects. The URL you save is the URL that receives the POST. If that URL returns 429 or a 5xx status, addy.io tries again. A 4xx status is not tried again.

If five deliveries to the same URL fail in a row, addy.io pauses that URL for one hour and emails you. The rule stays active, so its other actions still run. A successful delivery removes the pause. After the hour, addy.io tries the URL again.

<h2 id="what-is-in-the-payload">What is in the payload</h2>

The body is JSON. The `X-Addy-Event` header is `alias.email.received`.

A details-only payload looks like this:

```json
{
  "id": "a stable id for this alias and message",
  "event": "alias.email.received",
  "email_type": "forward",
  "alias": {
    "id": "alias-id",
    "email": "shop@johndoe.anonaddy.com"
  },
  "from": "sender@example.com",
  "subject": "Your receipt",
  "message_id": "message-id",
  "size": 1200,
  "attachment_count": 0,
  "received_at": "2026-10-07T12:00:00+00:00"
}
```

`email_type` is `forward`, `reply`, or `send`. `attachment_count` includes files that were left out of the payload. Attachments are never posted.

When **Include the message body** is selected, the payload also has `text`, `html`, and `truncated`. The combined text and HTML is limited to 1 MB. `truncated` is `true` when addy.io had to cut the body to fit that limit. Images that are attached with a `cid:` reference are not included, so those images will not display. Normal image links in the HTML still work.

When **Include the headers** is selected, the payload also has `headers` and `headers_truncated`. Each header is an object with `name` and `value`. The name is lowercase. Repeated headers stay as separate objects. `Received`, `DKIM-Signature`, `X-Spamd-Result`, and headers whose name starts with `x-anonaddy-` are left out. The combined header text is limited to 1 MB. `headers_truncated` is `true` when addy.io had to cut the headers to fit that limit.

Use `id` to ignore a repeat of the same email.

<h2 id="example-zapier">Example: add a spreadsheet row with Zapier</h2>

You can send the webhook to an automation tool instead of your own server. This example uses [Zapier](https://zapier.com/) to add a row when an alias receives mail. **Webhooks by Zapier** is on Zapier's paid plans. The same idea works with any tool that gives you a public https URL, such as [Make](https://www.make.com/), [n8n](https://n8n.io/) or [webhook.site](https://webhook.site): paste that URL into the rule.

addy.io does not have a test button. Zapier learns the fields from a real email. Zapier's own guide is [Trigger Zaps from webhooks](https://help.zapier.com/hc/en-us/articles/8496288690317-Trigger-Zap-workflows-from-webhooks).

1. In Zapier, create a Zap. For the trigger, choose **Webhooks by Zapier**.
2. Set the event to **Catch Hook**. Leave **Pick Off A Child Key** empty, then continue. Catch Hook reads the JSON and splits it into fields.
3. On the **Test** tab, copy the webhook URL. It looks like `https://hooks.zapier.com/hooks/catch/...`.
4. In addy.io, create a rule for the alias you want to watch. Under **Actions**, choose **send a webhook to** and paste the Zapier URL. Leave **Include the message body** and **Include the headers** unselected. The details in the payload are enough for a row. Save the rule, and set it to run on **Forwards**.
5. Send an email to that alias that matches the rule.
6. In Zapier, on the **Test** tab, click **Test trigger**. Zapier lists the fields from the POST, including the alias email, `from`, `subject`, and `received_at`.
7. Add an action. For example, choose **Google Sheets** and **Create Spreadsheet Row**, and map those fields to columns.
8. Turn the Zap on.

A Catch Hook Zap does not check the `X-Addy-Signature` header. Treat the Zapier URL as a secret. To check the signature, send the webhook to your own server and follow [Verify the signature](#verify-the-signature).

If the Zap is turned off, Zapier can respond with 404. addy.io counts that as a failed delivery and pauses the URL after five failures in a row. Turn the Zap on, or remove the webhook action, when you are not using it.

Select **Include the message body** if you also want the email text in the row. Attachments are still left out.

<h2 id="other-ideas">Other ideas</h2>

Use a condition so the webhook runs only for the alias, sender, or subject you care about.

- Send a chat message, such as Slack or ntfy, when a login alias or a bank alias receives mail.
- Create a task, such as in Todoist, when a support alias receives mail.
- Add a receipt row only. Set a condition on the sender or the subject, so the sheet is not every email.
- Notify your own server when a parcel alias receives a shipping email.

<h2 id="verify-the-signature">Verify the signature</h2>

Each account has one webhook signing secret. After you save a webhook rule, open **Rules** and click **More info**. The secret is shown there. It is also `webhook_secret` in the [account details](https://app.addy.io/docs/#account-details-GETapi-v1-account-details) API response.

addy.io signs the **raw JSON body** with HMAC-SHA256. The key is the secret string as shown. Do not hex-decode it. The lowercase hex digest is the `X-Addy-Signature` header.

Read the raw body before you parse it as JSON. Compute the HMAC of those exact bytes and compare it with the header. Reject the request when the header is missing or the values differ. A parsed and re-encoded JSON object can change the signature, so compare the raw body.

```php
$expected = hash_hmac('sha256', $rawBody, $secret);

if (! hash_equals($expected, $signatureHeader)) {
    // Reject the request.
}
```
