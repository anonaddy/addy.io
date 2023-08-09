---
extends: _layouts.post
ogtype: article
image: https://addy.io/assets/img/sanctum-api-token.png
section: content
title: Updating the API provider
date: 2022-08-01
description: This post gives some more details on the API provider update from Laravel Passport to Laravel Sanctum, what motivated the change and what action needs to be taken now that the update is live.
categories: [updates]
---

This post gives some more details on the API provider update from [Laravel Passport](https://laravel.com/docs/9.x/passport) to [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum), what motivated the change and what action needs to be taken now that the update is live.

## Migrating from Laravel Passport to Laravel Sanctum

When I intially launched the API for addy.io, Laravel Passport was the only offically supported option available and it has worked great. Laravel Passport provides a full OAuth2 server implementation which is overkill when addy.io only requires the use of personal access tokens.

If Laravel Sanctum had been available at the time I would have chosen that solution instead as the implementation is much more lightweight and simpler to install/use.

Santcum has much shorter API tokens which should be less confusing and easier to use for the extensions and apps.

This update has added a last used column so you can see when you last used a token and also the option to choose an expiry date for new tokens.

## What action is required?

If you **aren't using** the browser extensions, mobiles apps or calling the API any other way then you **do not need to take any action** at all.

If you **are using any of the above** then you will have received an email notification letting you know about this update. You will **need to re-create** all of your previous API tokens as they will have disappeared now that this update has been pushed live.

For the browser extension, go to the settings tab, click "Logout" and then you will be able to enter your new token.

For the AddyManager app click the settings cog in the top right and then click "Logout", you will then be able to enter your new token.

The addy.io for Android app will automatically detect your token is invalid so will allow you to enter a new one when opening it.

For the Bitwarden extension simply paste in your new token in the generator tab.

## What is an API?

API stands for **Application Programming Interface**, it is essentially a way of communicating with a server (in this case the addy.io server) by making requests to different URLs (endpoints).

For example, if you were to make a `GET` request to `/api/v1/aliases` you would receive a response containing a list of all of your email aliases.

Using an API, developers can create their own software such as browser extensions or mobile applications to interact with the API server.

The above example ignores authentication for simplicity but when making a request to an API they typically use tokens to authenticate users. The tokens need to be included in each request so that the API can properly authenticate the user.

This enables logged in users to easily consume the same API that is used by other apps e.g. the browser extension.

## How do I get started using the API?

First things first, you need to generate a new API personal access token from your [account settings](https://app.addy.io/settings/api). After choosing a short name and an optional expiry date for the token it will be displayed on the screen.

This is the only time the token will ever be displayed, so please make a note of it in a safe place (e.g. password manager)!

If you just want to use this token for the browser extension or mobile apps, then all you need to do now is to paste this access token into it.

If you'd like to test out some of the other API endpoints then you can use software such as [Insomnia](https://insomnia.rest/), [Postman](https://www.getpostman.com/) or just plain old curl.

There is a [Postman Collection](https://app.addy.io/docs/collection.json) available for download too (also works with Insomnia)!

<div class="flex justify-center">
  <img class="shadow" src="/assets/img/sanctum-api-token.png" alt="Sanctum API token" title="Sanctum API token">
</div>

## Where can I find the API documentation?

You can find documentation for the API here - [https://app.addy.io/docs/](https://app.addy.io/docs/)

The documentation walks you through authentication and lists all available endpoints. Each endpoint includes an example request and example response.

The different error codes that can be returned by the API are also listed with explanations.

## Feedback and suggestions

If you have any feedback or suggestions please just [get in touch](/contact/) and make sure to sign up to the newsletter if you'd like to receive updates on new features!
