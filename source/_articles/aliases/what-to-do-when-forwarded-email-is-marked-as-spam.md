---
extends: _layouts.article
ogtype: article
image: https://addy.io/assets/img/help/aliases/deactivating-an-alias.png
section: content
title: What to do when forwarded email is marked as spam
date: 2026-10-14
description: What to do when a provider reports that email forwarded by addy.io was marked as spam. Leave the alias off, block the sender, or allow the alias address and turn it back on.
helpCategories: [aliases]
order: 15
---

When your email provider tells addy.io that a forwarded message was marked as spam, addy.io deactivates the alias. Mail sent to that alias is no longer forwarded. This article explains how to stop the reports, and how to allow an alias when you still want the mail.

<h2 id="why-the-alias-was-deactivated">Why the alias was deactivated</h2>

The warning email lists the alias addresses. A report usually means someone marked a forwarded message as spam or junk in the real inbox that receives it.

Please do not use the Spam or Junk button on mail forwarded by addy.io. Use the [blocklist](/help/adding-an-entry-to-your-blocklist/) for senders you do not want. Marking forwarded mail as spam sends a report to the provider and can damage the reputation of the service. It is also against the [terms](/terms/).

A report from Outlook, Hotmail, Live, or MSN means the message was marked as junk. Microsoft does not send that report when its filter places the message in Junk on its own. Moving a message to Junk, or choosing Junk or Report junk, does send one.

Some other providers can file a message as junk without a click. If the mail is wanted, mark it as not junk and allow the alias address below.

<h2 id="if-you-do-not-want-the-mail">If you do not want the mail</h2>

Leave the alias off, or [delete](/help/deleting-an-alias/) it. You can [turn it back on](/help/deactivating-email-aliases/) later.

To stop the same sender reaching your other aliases, [add the sender's email address or domain to your blocklist](/help/adding-an-entry-to-your-blocklist/).

<h2 id="if-you-still-want-the-mail">If you still want the mail</h2>

1. Open the message in Spam or Junk and mark it as not junk.
2. Allow the alias address from the warning email, using the steps for your provider below. Allow that address, not a general "addy.io" domain. Forwarded mail is sent from the alias address.
3. [Turn the alias back on](/help/deactivating-email-aliases/).

<h2 id="gmail">Gmail</h2>

Gmail has no safe senders list. A filter set to never send the alias to spam is the step that lasts.

1. Open Gmail on a computer.
2. Select the gear icon, then **See all settings**.
3. Open **Filters and Blocked Addresses**.
4. Select **Create a new filter**.
5. In **From**, enter the alias address from the warning email.
6. Select **Create filter**.
7. Tick **Never send it to Spam**, then select **Create filter**.

If the message is already in Spam, open it and select **Report not spam**.

Google's own filter steps are here: [Create rules to filter your emails](https://support.google.com/mail/answer/6579?hl=en-GB).

<h2 id="outlook-hotmail-live-and-msn">Outlook, Hotmail, Live, and MSN</h2>

1. Open Outlook.com.
2. Select the gear icon, then **Mail**, then **Junk email**.
3. Open **Safe senders and domains** and select **Add**.
4. Enter the alias address from the warning email and save.

If the message is in Junk, open it and select **Not junk**.

Microsoft's own steps are here: [Safe senders in Outlook.com](https://support.microsoft.com/en-gb/office/safe-senders-in-outlook-com-470d4ee6-e3b6-402b-8cd9-a6f00eda7339).

<h2 id="yahoo-and-aol">Yahoo and AOL</h2>

1. Open the **Spam** folder. In Yahoo Mail, select **More** under Sent if you do not see Spam.
2. Select the message.
3. Select **Not spam**.

Yahoo then delivers later messages from that sender to the inbox. AOL Mail uses the same action.

Yahoo's own steps are here: [Manage spam and mailing lists in Yahoo Mail](https://help.yahoo.com/kb/SLN28056.html).

<h2 id="icloud">iCloud</h2>

1. Open [iCloud Mail](https://www.icloud.com/mail).
2. Open **Junk**.
3. Select the message, then **Not Junk**.
4. Add the alias address to your contacts.

Apple's junk mail settings are here: [Use junk mail settings in iCloud Mail](https://support.apple.com/en-gb/guide/icloud/mm6b1a3f8a/icloud).

<h2 id="proton-mail">Proton Mail</h2>

Add the alias address to your allow list. Proton's steps are here: [How to add senders to your allow list](https://proton.me/support/spam-filtering#how-to-add-senders-to-your-allow-list).

<h2 id="fastmail">Fastmail</h2>

1. Open **Settings**.
2. Go to **Spam protection**.
3. Add the alias address to the allow list.

<h2 id="another-provider">Another provider</h2>

Mark the message as not junk, then add the alias address to that provider's allow list, safe senders, or contacts. If the provider has no allow list, add the address to your contacts and move the message to the inbox.
