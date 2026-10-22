---
title: "Free, Open-source Anonymous Email Forwarding"
width: full
---

@extends('_layouts.master')

@section('body')
<div class="mk">
  <section class="hero">
    <div class="wrap hero-grid">
      <div class="hero-copy">
        <a class="pill" href="/blog/addy-io-now-blocks-tracking-pixels/">addy.io now blocks tracking pixels →</a>
        <h1 class="h1">A different email address for every website</h1>
        <p>Sign up for things without giving out your real email. Every site gets its own address that forwards to your inbox, and you can switch any of them off in one click.</p>
        <form class="hero-form" id="hero-form" action="{{ $page->appUrl }}/register" method="GET">
          <label for="hero-username">Choose your username</label>
          <div class="hero-form-row">
            <label class="hero-field" for="hero-username">
              <input id="hero-username" name="username" placeholder="johndoe" maxlength="20" autocomplete="off" autocapitalize="off" spellcheck="false" aria-describedby="hero-username-hint">
              <span class="hero-suffix" aria-hidden="true">.anonaddy.com</span>
            </label>
            <button class="btn btn-primary" type="submit" data-umami-event="signup-button" data-umami-event-source="hero-cta">Get started free</button>
          </div>
          <div class="hero-hint" id="hero-username-hint">Your aliases will look like <span class="mono">shop@<b class="u" id="hero-username-echo">johndoe</b>.anonaddy.com</span></div>
        </form>
        <div class="hero-checks"><span>✓ Free forever plan</span><span>✓ No card required</span><span>✓ Open source</span><a class="text-link" href="#how">See how it works →</a></div>
      </div>
      <div class="hero-art">
        <div class="hero-panel">
          <div id="hero-lottie" role="img" aria-label="Illustration of email aliases forwarding messages to your inbox">
            <img class="hero-lottie-fallback" src="/assets/img/hero/addy-hero.svg" alt="" width="1920" height="1000" decoding="async">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="trust" aria-label="Why people trust addy.io">
    <div class="wrap trust-row">
      <span class="trust-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM16 12v1.5a2.5 2.5 0 0 0 5 0V12a9 9 0 1 0-3.5 7.1"/></svg>5M+ aliases created</span>
      <a class="trust-link trust-item" href="https://www.trustpilot.com/review/addy.io" target="_blank" rel="nofollow noreferrer noopener"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l3.1 6.3 6.9 1-5 4.9 1.2 6.8L12 17.8 5.8 21l1.2-6.8-5-4.9 6.9-1z"/></svg>{{ $page->socialProof['trustpilot']['score'] }} on Trustpilot</a>
      <a class="trust-link trust-item" href="https://github.com/anonaddy/anonaddy" target="_blank" rel="nofollow noreferrer noopener"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19c-4.3 1.4-4.3-2.5-6-3m12 5v-3.5c0-1 .1-1.4-.5-2 2.8-.3 5.5-1.4 5.5-6a4.6 4.6 0 0 0-1.3-3.2 4.2 4.2 0 0 0-.1-3.2s-1.1-.3-3.5 1.3a12.3 12.3 0 0 0-6.2 0C6.5 2.8 5.4 3.1 5.4 3.1a4.2 4.2 0 0 0-.1 3.2A4.6 4.6 0 0 0 4 9.5c0 4.6 2.7 5.7 5.5 6-.6.6-.6 1.2-.5 2V21"/></svg>Open source on GitHub · {{ $page->socialProof['github']['starsFormatted'] }} ★</a>
      <a class="trust-link trust-item" href="/blog/addy-io-passes-independent-security-audit/"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10zM9 12l2 2 4-4"/></svg>Audited by Securitum</a>
      <a class="trust-link trust-item" href="/features/#apps"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM11 18h2"/></svg>iOS · Android · Chrome · Firefox</a>
    </div>
  </section>

  <section class="section" id="how">
    <div class="wrap">
      <div class="eyebrow">// how it works</div>
      <h2 class="h2 reveal">Set up in three steps</h2>
      <ol class="grid grid-3 reveal mt-9 mb-0 p-0 list-none">
        <li class="card lift">
          <div class="step-num">1</div>
          <h3>Choose a username</h3>
          <p>Pick any username, for example <b class="u">johndoe</b>. You get your own domain: <span class="mono text-ink"><span class="u">johndoe</span>.anonaddy.com</span>. To stay anonymous, choose one that isn't linked to your real name.</p>
        </li>
        <li class="card lift">
          <div class="step-num">2</div>
          <h3>Give each site its own email</h3>
          <div class="demo" aria-hidden="true"><span class="label">Email</span><span class="type">shop@<span class="u">johndoe</span>.anonaddy.com</span></div>
          <p>Make one up on the spot. It appears in your dashboard when the first email arrives.</p>
        </li>
        <li class="card lift">
          <div class="step-num">3</div>
          <h3>Turn off what you don't want</h3>
          <div class="demo spread" aria-hidden="true"><span class="alias">old-forum@<span class="u">johndoe</span>.anonaddy.com</span><span class="toggle"></span></div>
          <p>If an alias starts getting junk, deactivate it. New mail to it is silently discarded.</p>
        </li>
      </ol>
    </div>
  </section>

  <section class="section">
    <div class="wrap">
      <div class="eyebrow">// why it matters</div>
      <h2 class="h2 reveal max-w-[760px]">Your email address is the key that links every account you own.</h2>
      <div class="why reveal">
        <div class="why-head" aria-hidden="true"><span></span><span>Without addy.io</span><span class="why-with-label">With addy.io</span></div>
        <div class="why-row">
          <div class="why-topic"><div class="risk">Data breach</div><h3>A site gets hacked</h3></div>
          <div class="why-cell why-without"><span class="why-cell-label">Without addy.io</span><p><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>Your real address ends up on every leaked list.</p></div>
          <div class="why-cell why-with"><span class="why-cell-label">With addy.io</span><p><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>Only that one alias leaks. Delete it and move on.</p></div>
        </div>
        <div class="why-row">
          <div class="why-topic"><div class="risk">Spam</div><h3>Your address gets sold</h3></div>
          <div class="why-cell why-without"><span class="why-cell-label">Without addy.io</span><p><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>Spam arrives with no way to tell who sold your address.</p></div>
          <div class="why-cell why-with"><span class="why-cell-label">With addy.io</span><p><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>You see which alias got the spam, so you know who sold it. Switch it off and the spam stops.</p></div>
        </div>
        <div class="why-row">
          <div class="why-topic"><div class="risk">Tracking</div><h3>Companies link your profiles</h3></div>
          <div class="why-cell why-without"><span class="why-cell-label">Without addy.io</span><p><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>One address ties your accounts together across every site.</p></div>
          <div class="why-cell why-with"><span class="why-cell-label">With addy.io</span><p><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>Unique aliases can't be matched across sites, and tracking pixels are stripped before mail reaches you.</p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="features">
    <div class="wrap">
      <div class="features-head">
        <h2 class="h2 reveal m-0">Everything you need, nothing you don't</h2>
        <p class="lead">Browser extension, mobile apps and your own domain, all managed from one dashboard.</p>
      </div>
      <div class="grid bento reveal">
        <div class="tile span-2 lift"><h3>Your alias dashboard</h3><p>See every alias, how many emails it forwarded, and turn any off in one click.</p>
          @include('_partials.mockups.dashboard')
        </div>
        <div class="tile t2 lift"><h3>Browser extension</h3><p>Create an alias right inside any signup form.</p>
          <div class="popup-frame">@include('_partials.mockups.extension-field')</div>
        </div>
        <div class="tile t1 lift"><h3>Reply anonymously</h3><p>Reply and send from an alias. Your real address never appears.</p></div>
        <div class="tile lift"><h3>Use your own domain</h3><p>Bring a domain you own and make aliases on it.</p></div>
        <div class="tile lift"><h3>GPG / OpenPGP</h3><p>Encrypt forwarded emails with your public key.</p></div>
        <div class="tile t3 span-2 lift"><div class="flex-[1_1_240px]"><h3>iOS and Android apps</h3><p class="mt-2">Manage aliases on the go, with open-source mobile apps.</p></div><div class="phone-frame">@include('_partials.mockups.phone')</div></div>
        <div class="tile navy lift"><h3>Blocks tracking pixels</h3><p>Stops senders knowing when you opened their email. Each email links to a report of what was removed, and your dashboard shows how many were blocked.</p><div class="px-row" aria-hidden="true"><span class="px"></span>1×1 tracker removed</div></div>
      </div>
      <div class="grid more">
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3h5v5M4 20L21 3M21 16v5h-5M15 15l6 6M4 4l5 5"/></svg></div><h3>Random aliases</h3><p>One-off addresses like <span class="mono">x481n904@anonaddy.me</span> with no username in them.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div><h3>Additional usernames</h3><p>Separate work and personal under one account.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3h5v5M8 3H3v5M12 22v-8.3a4 4 0 0 0-1.2-2.8L3 3M21 3l-7.8 7.8"/></svg></div><h3>Multiple recipients</h3><p>Send one alias to several real inboxes at once.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4l-7.2 7.2a2 2 0 0 1-2.8 0L2 12V2h10l8.6 8.6a2 2 0 0 1 0 2.8zM7 7h.01"/></svg></div><h3>Labels</h3><p>Tag aliases like Shopping or Banking and filter by them.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.5V19l4 2v-8.5L22 3z"/></svg></div><h3>Rules</h3><p>Act on emails that match conditions you set: block senders, set labels, rewrite the subject or send a webhook.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20zM4.9 4.9l14.2 14.2"/></svg></div><h3>Blocklist</h3><p>Block specific senders or whole domains across all your aliases.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.6 7.6a5.5 5.5 0 1 1-7.8 7.8 5.5 5.5 0 0 1 7.8-7.8zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg></div><h3>Works with Bitwarden</h3><p>Bitwarden's generator can create an addy.io alias as it makes your password.</p></div>
        <div class="card lift"><div class="mini-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/></svg></div><h3>Developer API &amp; webhooks</h3><p>Automate aliases from code, and trigger a webhook when a rule matches an email.</p></div>
      </div>
      <div class="center-link"><a class="text-link" href="/features/">See every feature in detail →</a></div>
    </div>
  </section>

  <section class="section" aria-labelledby="reviews-title">
    <div class="wrap">
      <div class="reviews-head reveal">
        <div>
          <div class="eyebrow">// what users say</div>
          <h2 class="h2" id="reviews-title">“Solved my whole spam problem”</h2>
        </div>
        <div class="arrows">
          <button class="icon-btn" type="button" id="rev-prev" aria-label="Previous reviews"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg></button>
          <button class="icon-btn" type="button" id="rev-next" aria-label="Next reviews"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg></button>
        </div>
      </div>
      <div class="reviews-row" id="reviews" tabindex="0" aria-label="Reviews, scroll sideways">
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“I love this service. Solved my whole spam problem. The developer seems dedicated and passionate about security and privacy.”</blockquote><figcaption><img src="/assets/img/reviews/R-80.webp" alt="" width="40" height="40">Richard</figcaption></figure>
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“I've been using Addy.io for a few years now and it's been absolutely brilliant. Well worth the small amount of money for additional premium features.”</blockquote><figcaption><img src="/assets/img/reviews/grant-80.webp" alt="" width="40" height="40">Grant Marshall</figcaption></figure>
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“Great for protecting your real email address. Browser extension works perfectly.”</blockquote><figcaption><img src="/assets/img/reviews/kieran-80.webp" alt="" width="40" height="40">Kieran Colfer</figcaption></figure>
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“This is a must have tool for all privacy conscious people on the web.”</blockquote><figcaption><img src="/assets/img/reviews/jurgen-80.webp" alt="" width="40" height="40">Jürgen V.</figcaption></figure>
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“Smooth and easy in use. No missing emails. I became a happy paying customer.”</blockquote><figcaption><img src="/assets/img/reviews/dan-80.webp" alt="" width="40" height="40">Dan</figcaption></figure>
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“Powerful, and has a gorgeous GUI.”</blockquote><figcaption><img src="/assets/img/reviews/roke-80.webp" alt="" width="40" height="40">Roke Beedell</figcaption></figure>
        <figure class="review card lift"><div class="stars" aria-label="5 stars">★★★★★</div><blockquote>“Great service. Efficient, customer services fast and easy to use. Kudos.”</blockquote><figcaption><img src="/assets/img/reviews/lorenzo-80.webp" alt="" width="40" height="40">Lorenzo</figcaption></figure>
      </div>
    </div>
  </section>

  <section class="section pricing" id="pricing" data-pricing>
    <div class="wrap">
      <h2 class="h2 reveal m-0">Free to start. <span class="currency-symbol">$</span>1 a month to go further.</h2>
      <div class="grid plans reveal">
        <div class="plan">
          <div class="name">Free</div>
          <div class="tag">Everything you need to get started</div>
          <div class="price"><span class="currency-symbol">$</span>0<small>/month</small></div>
          <div class="billing">Free forever</div>
          <ul><li>✓ Unlimited aliases on your username</li><li>✓ 10 random aliases, like x481n904@anonaddy.me</li><li>✓ Forwards to 1 inbox</li><li>✓ Alias domains @anonaddy.com and @anonaddy.me</li><li>✓ 10MB of forwarded email a month</li></ul>
          <a class="cta" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-free-cta">Sign up free</a>
        </div>
        <div class="plan">
          <div class="name">Lite</div>
          <div class="tag">Reply privately and use your own domain</div>
          <div class="price"><span class="currency-symbol">$</span>1<small>/month</small></div>
          <div class="billing">Billed yearly</div>
          <ul><li>✓ Reply and send from aliases</li><li>✓ Use 1 domain you own</li><li>✓ More alias domains, including @addy.io</li><li>✓ Forward to up to 5 inboxes</li><li>✓ Block tracking pixels</li></ul>
          <a class="cta" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-lite-cta">Choose Lite</a>
        </div>
        <div class="plan pro">
          <div class="badge">BEST VALUE</div>
          <div class="name">Pro</div>
          <div class="tag">No limits on aliases or bandwidth</div>
          <div class="price"><span class="currency-symbol">$</span>3<small>/month</small></div>
          <div class="billing">Billed yearly, or <span class="currency-symbol">$</span>4 monthly</div>
          <ul><li>✓ Unlimited random aliases</li><li>✓ Reply and send from aliases</li><li>✓ Use up to 20 domains you own</li><li>✓ Forward to up to 30 inboxes</li><li>✓ Every alias domain, including @addy.io</li><li>✓ No monthly email limit</li></ul>
          <a class="cta" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="pricing-pro-cta">Choose Pro</a>
        </div>
      </div>
      <div class="shared">
        <span><b>Duo &amp; Family:</b> Pro for 2 people from <span class="currency-symbol">$</span>4.50/mo, or up to 5 from <span class="currency-symbol">$</span>7.50/mo.</span>
        <a class="text-link" href="/pricing/#shared-plans">See shared plans →</a>
      </div>
      <p class="perks">Paid plans also include exclusive discounts from privacy partners like Ente, Kagi, Tuta and Windscribe. <a class="text-link" href="/perks/">See all perks →</a></p>
      <p class="mt-[26px] mb-0"><a class="text-link" href="/pricing/" data-umami-event="pricing-click" data-umami-event-source="homepage-compare">Compare all plans →</a></p>
    </div>
  </section>

  <section class="section">
    <div class="wrap faq">
      <div class="eyebrow text-center">// questions</div>
      <h2 class="h2 reveal text-center">Before you sign up</h2>
      <div class="faq-list">
        <details open><summary>Do I need to change my email provider?</summary><p>No. addy.io forwards to the inbox you already use, whether that's Gmail, Outlook, Proton or any other provider.</p></details>
        <details><summary>Is it really free?</summary><p>Yes. The free plan includes unlimited <a class="text-link" href="/help/terminology/#standard-alias">standard aliases</a> with no time limit.<span data-pricing> Paid plans start at <span class="currency-symbol">$</span>1/month when you want your own domain, replies from aliases and higher limits.</span></p></details>
        <details><summary>Does addy.io read my emails?</summary><p>No. Emails are forwarded automatically and aren't stored, unless a delivery fails and you've turned on storing failed deliveries. For extra protection, turn on GPG / OpenPGP encryption so forwarded emails are encrypted with your public key and only you can read them.</p></details>
        <details><summary>Can I reply without revealing my real address?</summary><p>Yes, on the Lite and Pro plans. Replies and new emails are sent from your alias, so the recipient never sees your real address.</p></details>
        <details><summary>Will forwarded emails end up in spam?</summary><p>Most forwarded email lands straight in your inbox. Now and then a provider may filter a message, especially when you first start using addy.io. If that happens, mark it as “not spam” so your inbox learns. <a class="text-link" href="/help/what-to-do-when-forwarded-email-is-marked-as-spam/">Our guide shows how for Gmail, Outlook and other providers</a>. If an alias starts getting unwanted email, switch the alias off instead of marking messages as spam, which harms delivery for everyone.</p></details>
        <details><summary>Will websites accept my alias?</summary><p>Almost all do. A few sites wrongly treat alias services as throwaway email and block their domains. If that happens, try another addy.io alias domain or your own domain, and <a class="text-link" href="/help/report-a-website-that-is-blocking-addy-io-alias-domains/">let us know about the site</a> so we can ask them to allow addy.io.</p></details>
        <details><summary>Am I locked in to addy.io?</summary><p>No. You can export a list of your aliases at any time. Aliases on a domain you own are fully portable: point the domain somewhere else and they keep working. Aliases on addy.io’s own domains, including your username, only work through addy.io, so use your own domain for anything you might want to move later. addy.io is also open source, so you can run it on your own server.</p></details>
        <details><summary>How is addy.io different from other alias services?</summary><p>addy.io is independent and open source, so anyone can check how it works or run it themselves. The free plan includes unlimited aliases on your own username, and it works with any email provider on any device. You can also use your own domains, reply from aliases and encrypt forwarded emails with GPG / OpenPGP.</p></details>
        <details><summary>Who's behind addy.io?</summary><p>addy.io is built and run by Will Browning, an independent web developer in the UK and a long-time advocate for online privacy and open-source software. There's no venture capital funding. Paid subscriptions cover the servers, so the service never relies on ads or selling your data.</p></details>
      </div>
      <p class="mt-[22px] mb-0 text-center"><a class="text-link" href="/faq/">More answers in the FAQ →</a></p>
    </div>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">Your next sign-up doesn't need your real email.</h2>
        <p>Free forever plan, no card required.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="footer-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/hero-animation.js') }}"></script>
<script type="module" src="{{ $page->vite('source/_assets/js/home.js') }}"></script>
<script>
    fetch("{{ $page->appUrl }}/default-currency").then((e => e.json())).then((e => {
        [...document.getElementsByClassName("currency-symbol")].forEach((n => n.innerText = e.currency))
    }));
</script>
@endpush
