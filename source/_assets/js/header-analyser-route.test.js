// Run with npm test
import assert from 'node:assert/strict'
import { test } from 'node:test'
import { explainDelays, parseReceived, providerName } from './header-analyser-route.js'

const route = (received) => received.map(parseReceived).reverse()

// The route from a user's report: Apple Mail → Gmail → addy.io → Yahoo, with Yahoo taking 37 minutes to accept it
const YAHOO_DEFERRED = [
  'from 127.0.0.1 by atlas-production.v2-mail-prod1-bf1.omega.yahoo.com with HTTP; Fri, 6 Nov 2026 01:34:24 +0000',
  'from 185.70.196.149 (EHLO mail2.anonaddy.me) by with SMTPs; Fri, 6 Nov 2026 01:34:24 +0000',
  'from mail2.anonaddy.me (localhost [127.0.0.1]) by mail2.anonaddy.me (Postfix) with ESMTPS id 4Xk2pQ1zW9z9sWm for <me@yahoo.com>; Fri, 6 Nov 2026 00:57:30 +0000 (UTC)',
  'from mail-dl1-x122a.google.com (mail-dl1-x122a.google.com [IPv6:2607:f8b0:4864:20::122a]) by mail2.anonaddy.me (Postfix) with ESMTPS id 4Xk2pP6Yx3z9sWl for <shop@johndoe.anonaddy.com>; Fri, 6 Nov 2026 00:57:26 +0000 (UTC)',
  'by mail-dl1-x122a.google.com with SMTP id a1csp1234567; Thu, 5 Nov 2026 16:57:26 -0800 (PST)',
  'from smtpclient.apple ([162.206.193.29]) by smtp.gmail.com with ESMTPSA id b2sm7654321; Thu, 05 Nov 2026 16:57:17 -0800 (PST)',
]

test('a Yahoo Received line without its own server name is not read as "by with"', () => {
  const hop = parseReceived(YAHOO_DEFERRED[1])

  assert.equal(hop.by, null)
  assert.equal(hop.from, 'mail2.anonaddy.me')
  assert.equal(hop.fromIp, '185.70.196.149')
  assert.equal(hop.with, 'SMTPs')
})

test('a Yahoo Received line with a server name keeps it', () => {
  const hop = parseReceived(
    'from 185.70.196.149 (EHLO mail2.anonaddy.me) (185.70.196.149) by mta4024.mail.bf1.yahoo.com with SMTPs; Fri, 6 Nov 2026 01:34:24 +0000'
  )

  assert.equal(hop.by, 'mta4024.mail.bf1.yahoo.com')
  assert.equal(hop.from, 'mail2.anonaddy.me')
  assert.equal(hop.fromIp, '185.70.196.149')
})

test('Postfix Received lines are parsed as before', () => {
  const hop = parseReceived(YAHOO_DEFERRED[3])

  assert.equal(hop.from, 'mail-dl1-x122a.google.com')
  assert.equal(hop.fromIp, '2607:f8b0:4864:20::122a')
  assert.equal(hop.by, 'mail2.anonaddy.me')
  assert.equal(hop.tls, true)
  assert.equal(hop.date.toISOString(), '2026-11-06T00:57:26.000Z')
})

test('a delay handing the email from addy.io to Yahoo is put down to Yahoo', () => {
  assert.deepEqual(explainDelays(route(YAHOO_DEFERRED)), [
    null,
    null,
    null,
    null,
    { kind: 'handoff', provider: 'Yahoo' },
    null,
  ])
})

test('a delay handing the email to an unknown provider names its domain', () => {
  const explanations = explainDelays(
    route([
      'from mail2.anonaddy.me (mail2.anonaddy.me [192.0.2.25]) by mx1.example.net with ESMTPS id 1; Fri, 6 Nov 2026 02:00:00 +0000',
      'from smtp.shop.example (smtp.shop.example [198.51.100.7]) by mail2.anonaddy.me (Postfix) with ESMTPS id 2; Fri, 6 Nov 2026 01:00:00 +0000',
    ])
  )

  assert.deepEqual(explanations, [null, { kind: 'handoff', provider: 'example.net' }])
})

test('a delay before the email reached addy.io is put down to the sender', () => {
  const explanations = explainDelays(
    route([
      'from mail2.anonaddy.me (mail2.anonaddy.me [192.0.2.25]) by mx.google.com with ESMTPS id 1; Fri, 6 Nov 2026 01:20:02 +0000',
      'from smtp.shop.example (smtp.shop.example [198.51.100.7]) by mail2.anonaddy.me (Postfix) with ESMTPS id 2; Fri, 6 Nov 2026 01:20:00 +0000',
      'from app-server-3 (unknown [10.0.0.12]) by smtp.shop.example (Postfix) with ESMTP id 3; Fri, 6 Nov 2026 01:00:00 +0000',
      'from app-server-3 (unknown [10.0.0.12]) by app-server-3 with ESMTP id 4; Fri, 6 Nov 2026 00:30:00 +0000',
    ])
  )

  assert.deepEqual(explanations, [
    null,
    { kind: 'before-addy', provider: null },
    { kind: 'before-addy', provider: null },
    null,
  ])
})

test('a delay after the provider accepted the email is put down to the provider', () => {
  const explanations = explainDelays(
    route([
      'from mx.google.com by inbox.google.com with SMTP id 1; Fri, 6 Nov 2026 01:30:00 +0000',
      'from mail2.anonaddy.me (mail2.anonaddy.me [192.0.2.25]) by mx.google.com with ESMTPS id 2; Fri, 6 Nov 2026 01:00:05 +0000',
      'from smtp.shop.example (smtp.shop.example [198.51.100.7]) by mail2.anonaddy.me (Postfix) with ESMTPS id 3; Fri, 6 Nov 2026 01:00:00 +0000',
    ])
  )

  assert.deepEqual(explanations, [null, null, { kind: 'after-handoff', provider: 'Google' }])
})

test('quick hops and delays inside addy.io are not explained', () => {
  const explanations = explainDelays(
    route([
      'from mail2.anonaddy.me (mail2.anonaddy.me [192.0.2.25]) by mx.google.com with ESMTPS id 1; Fri, 6 Nov 2026 01:05:30 +0000',
      'from mail2.anonaddy.me (localhost [127.0.0.1]) by mail2.anonaddy.me (Postfix) with ESMTPS id 2; Fri, 6 Nov 2026 01:05:00 +0000',
      'from smtp.shop.example (smtp.shop.example [198.51.100.7]) by mail2.anonaddy.me (Postfix) with ESMTPS id 3; Fri, 6 Nov 2026 01:00:00 +0000',
    ])
  )

  assert.deepEqual(explanations, [null, null, null])
})

test('emails that never came through addy.io are not explained', () => {
  const explanations = explainDelays(
    route([
      'from smtp.shop.example (smtp.shop.example [198.51.100.7]) by mx.google.com with ESMTPS id 1; Fri, 6 Nov 2026 02:00:00 +0000',
      'from app-server-3 (unknown [10.0.0.12]) by smtp.shop.example (Postfix) with ESMTP id 2; Fri, 6 Nov 2026 01:00:00 +0000',
    ])
  )

  assert.deepEqual(explanations, [null, null])
})

test('provider names come from the well-known services or the server domain', () => {
  assert.equal(providerName('atlas-production.v2-mail-prod1-bf1.omega.yahoo.com'), 'Yahoo')
  assert.equal(providerName('mta7.am0.yahoodns.net.'), 'Yahoo')
  assert.equal(providerName('mx.google.com'), 'Google')
  assert.equal(providerName('eur01.mail.protection.outlook.com'), 'Microsoft 365')
  assert.equal(providerName('mx1.mail.example.co.uk'), 'example.co.uk')
})
