---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/mobile-app-updates-rewritten.jpg
section: content
title: 'New addy.io mobile app updates: Rewritten, not re-heated'
date: 2026-10-05
description: iOS 2.7.0 and Android 6.6.0 rewrite the addy.io mobile apps. Search for aliases from your home screen, verify custom domains, and manage aliases in bulk.
categories: [updates]
author: Stjin
---

<div class="flex justify-center mb-8">
  <img class="shadow" src="/assets/img/mobile-app-updates-rewritten.jpg" alt="New addy.io mobile app updates. Rewritten, not re-heated." title="New addy.io mobile app updates">
</div>

Hello everyone!

I am proud to release the latest updates for the addy.io mobile apps: [iOS v2.7.0](https://github.com/anonaddy/addy-ios/releases/tag/v2.7.0) and [Android v6.6.0](https://github.com/anonaddy/addy-android/releases/tag/v6.6.0).

Both apps have undergone extensive rewrites under the hood to modernise their architectures, improve battery usage, and eliminate long-standing UI bottlenecks.

Here are the biggest changes:

## Shared additions

- **System search integration:** You can now search for aliases directly from your device's home screen or app launcher without opening the app first (Spotlight on iOS, AppSearch on Android, only on supported launchers - there are not many).
- **Domain sending verification:** You can now verify your custom domain's DNS records and mail delivery configuration directly within domain settings.
- **Direct blocklisting:** Deep link support and one-tap blocking for senders or domains, straight from failed delivery details.

## Android highlights (v6.6.0)

- **Drastically smaller app size:** The networking layer was rebuilt on OkHttp, and R8 minification is enabled. The APK shrunk from about 17.7 MB down to 5.9 MB (about 66% smaller), while making network calls faster and lighter on battery.
- **Quick Settings tile:** A tile in your notification shade quickly generates a fresh alias and copies it to your clipboard.
- **Foldable and tablet support:** Responsive grid layouts, with dynamic column scaling and state preservation across folds.

## iOS highlights (v2.7.0)

- **mTLS support:** Full support for self-hosted instances that use custom SSL certificates.
- **Bulk alias management:** Long-press or multi-select aliases to activate, deactivate, pin, assign labels, change recipients, or delete them in batches.

## Bug reports and feedback

Because large portions of both codebases were rewritten from the ground up, there may be edge cases or regressions that slipped through testing. If you run into any bugs or unexpected behaviour, please report them directly on the GitHub repositories so I can address them quickly:

- [iOS issues](https://github.com/anonaddy/addy-ios/issues)
- [Android issues](https://github.com/anonaddy/addy-android/issues)

Full changelogs and manual downloads (APK and IPA) are available on GitHub:

- [iOS v2.7.0 release](https://github.com/anonaddy/addy-ios/releases/tag/v2.7.0)
- [Android v6.6.0 release](https://github.com/anonaddy/addy-android/releases/tag/v6.6.0)

Thanks to everyone for the continued support and feedback!

## A note on development

For transparency, I did use AI tools to help speed up parts of this rewrite. This project is something I am genuinely proud of, so nothing was blindly "vibecoded" or left to an automated pipeline. Every architectural decision, snippet, and commit was personally reviewed, refined, and tested by hand to keep the codebase clean and maintainable.
