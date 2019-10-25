---
extends: _layouts.post
ogtype: article
image: https://anonaddy.com/assets/img/api-access-token.png
section: content
title: The new API is now available
date: 2019-10-25
description: This post gives some more details on the release of the new AnonAddy API that can be used to manage aliases, recipients, domains and additional usernames. In order to use the API you first need to generate an API access token in your account settings.
categories: [updates]
---

This post gives some more details on the release of the new AnonAddy API that can be used to manage aliases, recipients, domains and additional usernames. In order to use the API you first need to generate an API access token in your account settings.

## What is an API?

API stands for **Application Programming Interface**, it is essentially a way of communicating with a server (in this case the AnonAddy server) by making requests to different URLs (endpoints).

For example, if you were to make a `GET` request to `https://app.anonaddy.com/api/v1/aliases` you would receive a response containing a list of all of your email aliases.

Using an API, developers can create their own software such as browser extensions or mobile applications to interact with the API server.

The above example ignores authentication for simplicity but when making a request to an API they typically use tokens to authenticate users. The tokens need to be included in each request so that the API can properly authenticate the user.

For authentication the AnonAddy API uses [Laravel Passport](https://laravel.com/docs/6.x/passport), which provides a full OAuth2 server implementation.

One of the great things about Laravel Passport is that it allows you to simply add the `CreateFreshApiToken` middleware to your web routes so that users can be securely authenticated using an encrypted cookie.

This enables logged in users to easily consume the same API that is used by other apps e.g. the browser extension.

## How do I get started using the API?

First things first, you need to generate a new API personal access token from your [account settings](https://app.anonaddy.com/settings). After choosing a short name for the token it will be displayed on the screen.

This is the only time the token will ever be displayed, so please make a note of it in a safe place (e.g. password manager)!

If you just want to use this token for the browser extension, then all you need to do now is to paste this access token into it.

If you'd like to test out some of the other API endpoints then you can use software such as [Insomnia](https://insomnia.rest/), [Postman](https://www.getpostman.com/) or just plain old curl.

There is a [Postman Collection](https://app.anonaddy.com/docs/collection.json) available for download too (also works with Insomnia)!

<div class="flex justify-center">
  <img class="shadow" src="https://anonaddy.com/assets/img/api-access-token.png" alt="API access token" title="API access token">
</div>

## Where can I find the API documentation?

You can find documentation for the API here - [https://app.anonaddy.com/docs](https://app.anonaddy.com/docs)

The documentation walks you through authentication and lists all available enpoints. Each endpoint includes an example request and example response.

The different error codes that can be returned by the API are also listed with explanations.

## Feedback and suggestions

If you have any feedback or suggestions please just drop me a line at [contact@anonaddy.com](mailto:contact@anonaddy.com) <span class="break-words text-sm">([70E400B5064061EB84181DABEDADE14D67325B36](https://keys.openpgp.org/search?q=70E400B5064061EB84181DABEDADE14D67325B36))</span> and sign up to the newsletter if you'd like to receive updates on new features!
