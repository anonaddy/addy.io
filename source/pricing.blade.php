---
title: "Pricing"
description: "Start free with unlimited standard aliases. Lite from $1/month and Pro from $3/month add your own domains, replies from aliases and higher limits."
width: full
marketing: true
---

@extends('_layouts.master')

@php
    $yes = '✓';
    $no = '—';
    $compare = [
        'aliases' => [
            ['Unlimited standard aliases', $yes, $yes, $yes],
            ['Active shared domain aliases', '10', '50', 'Unlimited'],
            ['Recipients (real email addresses)', '1', '5', '30'],
            ['Available alias domains', '2', '6', '7'],
            ['Custom domains', $no, '1', '20'],
            ['Additional usernames', $no, '5', '20'],
            ['Rules', $no, '5', '20'],
            ['Alias auto-creation with regex', $no, $yes, $yes],
            ['Option to disable catch-all', $no, $yes, $yes],
        ],
        'usage' => [
            ['Anonymous replies / sends per day', $no, '50', '200'],
            ['Monthly bandwidth', '10MB', '100MB', 'Unlimited'],
            ['Priority email queue', $no, $yes, $yes],
            ['View, download and resend failed deliveries', $no, $yes, $yes],
        ],
        'privacy' => [
            ['Block tracking pixels', $no, $yes, $yes],
            ['Blocklist to block senders', $no, $yes, $yes],
        ],
        'integrations' => [
            ['Send webhooks', $no, $yes, $yes],
            ['Access paid plan settings', $no, $yes, $yes],
        ],
        'support & perks' => [
            ['Priority support', $no, $yes, $yes],
            ['Access to exclusive discounts', $no, $yes, $yes],
        ],
    ];
@endphp

@section('body')
<div class="mk">
  <section class="page-hero">
    <div class="wrap">
      <div class="eyebrow">// pricing</div>
      <h1 class="h1">Simple plans. Simple prices.</h1>
      <p class="lead">Start free with unlimited standard aliases. Upgrade when you want your own domain, replies from aliases, or more of everything.</p>
      <div class="plan-switch" role="tablist" aria-label="Plan type">
        <button type="button" role="tab" id="tab-individual" aria-controls="individual-plans" aria-selected="true">Individual</button>
        <button type="button" role="tab" id="tab-shared" aria-controls="shared-plans" aria-selected="false">Duo &amp; Family</button>
      </div>
    </div>
  </section>

  <section class="wrap plan-panel" id="individual-plans" role="tabpanel" aria-labelledby="tab-individual">
    <div class="grid plans">
      <div class="plan">
        <div class="name">Free</div>
        <div class="tag">Everything you need to get started</div>
        <div class="price"><span class="currency-symbol">$</span>0<small>/month</small></div>
        <div class="billing">Free forever</div>
        <a class="cta" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-free-cta">Sign up free</a>
        <ul><li>✓ Unlimited standard aliases</li><li>✓ 10 active shared domain aliases</li><li>✓ 1 recipient</li><li>✓ 2 alias domains</li><li>✓ 10MB monthly bandwidth</li></ul>
      </div>
      <div class="plan">
        <div class="name">Lite</div>
        <div class="tag">Reply privately and use your own domain</div>
        <div class="price"><span class="currency-symbol">$</span>1<small>/month</small></div>
        <div class="billing">Billed yearly</div>
        <a class="cta" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-lite-cta">Choose Lite</a>
        <ul><li class="plus">Everything in Free, plus:</li><li>✓ 50 replies / sends from aliases a day</li><li>✓ 1 custom domain</li><li>✓ 5 recipients, 5 extra usernames</li><li>✓ Tracking pixel blocking</li><li>✓ 100MB monthly bandwidth</li></ul>
      </div>
      <div class="plan pro">
        <div class="badge">BEST VALUE</div>
        <div class="name">Pro</div>
        <div class="tag">No limits on aliases or bandwidth</div>
        <div class="price"><span class="currency-symbol">$</span>3<small>/month</small></div>
        <div class="billing">Billed yearly, or <span class="currency-symbol">$</span>4 billed monthly</div>
        <a class="cta" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-pro-cta">Choose Pro</a>
        <ul><li class="plus">Everything in Lite, plus:</li><li>✓ Unlimited shared domain aliases</li><li>✓ 200 replies / sends from aliases a day</li><li>✓ 20 custom domains, 20 extra usernames</li><li>✓ 30 recipients</li><li>✓ Unlimited bandwidth</li></ul>
      </div>
    </div>
  </section>

  <section class="wrap plan-panel" id="shared-plans" role="tabpanel" aria-labelledby="tab-shared">
    <p class="shared-intro">One person pays, and each member gets full Pro on their own independent account. Optionally share a custom domain, or deliver an alias to another member without sharing email addresses.</p>
    <div class="grid plans plans-2">
      <div class="plan">
        <div class="name">Duo</div>
        <div class="tag">2 members (you + 1)</div>
        <div class="price"><span class="currency-symbol">$</span>4.50<small>/month</small></div>
        <div class="billing">Billed yearly, or <span class="currency-symbol">$</span>6 billed monthly</div>
        <a class="cta cta-solid" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-duo-cta">Choose Duo</a>
      </div>
      <div class="plan">
        <div class="name">Family</div>
        <div class="tag">5 members (you + 4)</div>
        <div class="price"><span class="currency-symbol">$</span>7.50<small>/month</small></div>
        <div class="billing">Billed yearly, or <span class="currency-symbol">$</span>10 billed monthly</div>
        <a class="cta cta-solid" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-family-cta">Choose Family</a>
      </div>
    </div>
    <ul class="shared-list"><li>✓ Everything in Pro for each member</li><li>✓ Independent accounts</li><li>✓ Optionally share custom domains</li><li>✓ Deliver aliases to each other</li><li>✓ Invite by addy.io username</li><li>✓ One subscription</li></ul>
    <p class="shared-more"><a class="text-link" href="/help/duo-and-family-plans/">How Duo and Family plans work →</a></p>
  </section>

  <section class="section">
    <div class="wrap">
      <h2 class="h2 reveal m-0">Compare every feature</h2>
      <div class="compare-frame" tabindex="0" role="region" aria-label="Plan comparison, scroll sideways on small screens">
        <table class="compare">
          <thead>
            <tr><th scope="col">Feature</th><th scope="col">Free</th><th scope="col">Lite</th><th scope="col" class="pro-col">Pro</th></tr>
          </thead>
          <tbody>
            @foreach($compare as $group => $rows)
            <tr class="group"><th scope="rowgroup" colspan="4">// {{ $group }}</th></tr>
            @foreach($rows as $row)
            <tr>
              <th scope="row">{{ $row[0] }}</th>
              @foreach(array_slice($row, 1) as $value)
              <td class="{{ $value === $yes ? 'yes' : ($value === $no ? 'no' : '') }}">
                @if($value === $yes)<span aria-hidden="true">✓</span><span class="sr-only">Included</span>@elseif($value === $no)<span aria-hidden="true">—</span><span class="sr-only">Not included</span>@else{{ $value }}@endif
              </td>
              @endforeach
            </tr>
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
      <p class="perks">Paid plans also include exclusive discounts from privacy partners like Ente, Kagi, Tuta and Windscribe. <a class="text-link" href="/perks/">See all perks →</a></p>
    </div>
  </section>

  <section class="section">
    <div class="wrap faq">
      <div class="eyebrow text-center">// questions</div>
      <h2 class="h2 reveal text-center">Pricing questions</h2>
      <div class="faq-list">
        <details open><summary>Which payment methods do you accept?</summary><p>Card or PayPal, billed monthly or yearly, or cryptocurrency for yearly plans. You can also subscribe to Lite or Pro in the iOS and Android apps. When you subscribe you can give the payment provider an alias instead of your real email address.</p></details>
        <details><summary>Can I change plans at any time?</summary><p>Yes. Upgrade, downgrade or switch between monthly and yearly billing whenever you like from your subscription page. For card and PayPal subscriptions, Stripe prorates the change automatically: when you upgrade you only pay the difference, and when you downgrade any unused time is kept as credit. App Store and Google Play subscriptions are changed in your device's subscription settings. <a class="text-link" href="/help/managing-your-subscription/">How to change your plan</a></p></details>
        <details><summary>Can I pay without a recurring subscription?</summary><p>Yes. Buy a voucher code for Lite or Pro and redeem it on your account whenever you're ready, or give it to someone else as a gift. Vouchers are also sold by <a class="text-link" href="https://digitalgoods.proxysto.re/" target="_blank" rel="nofollow noopener noreferrer">ProxyStore</a>, an official reseller that accepts Monero, Bitcoin, cash and SEPA bank transfer. <a class="text-link" href="/help/voucher-codes/">How voucher codes work</a></p></details>
        <details><summary>What happens if I cancel?</summary><p>Your plan stays active until the end of the billing period. After that your account moves to the Free plan and paid features such as custom domains, additional usernames and extra recipients are deactivated. Resubscribe within 90 days and they're switched back on automatically. <a class="text-link" href="/faq/#what-happens-if-i-have-a-subscription-but-then-cancel-it">Full details in the FAQ</a></p></details>
        <details><summary>Can Duo and Family members see each other's emails?</summary><p>No. Every member has their own independent account, so aliases, recipients and usernames stay private. The owner can choose to share a custom domain, and members can deliver an alias to each other without seeing anyone's email address.</p></details>
        <details><summary>Can I self-host instead?</summary><p>Yes. addy.io is open source, and the <a class="text-link" href="/self-hosting/">self-hosting guide</a> walks you through running it on your own server.</p></details>
      </div>
      <p class="mt-[22px] mb-0 text-center"><a class="text-link" href="/faq/">More answers in the FAQ →</a></p>
    </div>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">Not sure yet? Start free.</h2>
        <p>Upgrade from your dashboard any time. No card needed to sign up.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="footer-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/pricing.js') }}"></script>
<script>
    fetch("{{ $page->appUrl }}/default-currency").then((e => e.json())).then((e => {
        [...document.getElementsByClassName("currency-symbol")].forEach((n => n.innerText = e.currency))
    }));
</script>
@endpush
