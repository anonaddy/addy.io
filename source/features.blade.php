---
title: "Features"
description: "Everything addy.io can do: unlimited aliases, anonymous replies, your own domains, GPG encryption, tracking pixel blocking, browser extension, mobile apps and an API."
width: full
marketing: true
---

@extends('_layouts.master')

@php
    $categories = [
        [
            'id' => 'aliases',
            'name' => 'Aliases',
            'intro' => 'A different address for every site, made on the fly or generated in advance.',
            'items' => [
                ['Username aliases', 'Use <span class="mono addr">anything@<span class="u">johndoe</span>.anonaddy.com</span>. Aliases are created the moment the first email arrives.', false],
                ['Random aliases', 'Generate one-off aliases like <span class="mono addr">x481n904@anonaddy.me</span> that can\'t be tied back to you.', false],
                ['Additional usernames', 'Add more usernames to one account to separate work, personal and everything else.', true],
                ['Multiple recipients per alias', 'Forward one alias to several real inboxes, such as you and your partner.', true],
                ['Labels', 'Tag aliases like Shopping or Banking and filter your list by them.', false],
                ['Rules', 'Act on emails that match conditions you set: block senders, set labels, change recipients, rewrite the subject or send a webhook.', true],
                ['Alias auto-creation with regex', 'Only create aliases on the fly when they match a pattern you choose.', true],
                ['Alias formats', 'Random characters or UUID on every plan, plus random words, names and nouns on paid plans. Set the default domain and format for new aliases.', false],
                ['Restore deleted aliases', 'Bring back an alias you deleted, or forget it so it\'s gone for good.', false],
            ],
        ],
        [
            'id' => 'privacy',
            'name' => 'Privacy and security',
            'intro' => 'Keep your real address out of every inbox, and keep your mail private on the way to yours.',
            'items' => [
                ['Reply and send from aliases', 'Reply to forwarded email, or start a new conversation, without revealing your real address.', true],
                ['GPG / OpenPGP encryption', 'Encrypt forwarded mail with your public key, and even hide the subject line.', false],
                ['Block tracking pixels', 'Stop senders seeing when and where you opened their email. Each email links to a report of what was removed, and your dashboard shows how many were blocked.', true],
                ['Blocklist', 'Block specific senders or whole domains from reaching any alias.', true],
                ['Deactivate or delete', 'Deactivate to silently discard mail, or delete so senders get a bounce.', false],
                ['Spam and DMARC warnings', 'Get a warning banner on forwarded emails that are flagged as spam or fail DMARC checks.', false],
                ['Encrypted replies', 'Encrypt replies to addy.io\'s public key so they\'re decrypted automatically, or encrypt replies and sends to anyone who publishes a key with WKD.', true],
                ['List-Unsubscribe control', 'Unsubscribe links in forwarded emails are rewritten so they\'re sent from your alias, not your real address.', true],
                ['Two-factor authentication', 'Protect your account with an authenticator app or a security key or passkey, with backup codes.', false],
            ],
        ],
        [
            'id' => 'domains',
            'name' => 'Your own domain',
            'intro' => 'Bring a domain you control and make any address on it. Aliases on your own domain move with you.',
            'items' => [
                ['Custom domains', 'Create <span class="mono addr">anything@example.com</span> aliases on domains you own.', true],
                ['Custom subdomains', 'Use a subdomain such as mail.example.com and keep the main domain for something else.', true],
                ['Catch-all control', 'Turn catch-all on or off for each domain, or use a regex so only matching aliases are created on the fly.', true],
                ['Display name', 'Choose the From name people see when you reply, for each alias, username or domain.', true],
                ['Import and export', 'Export every alias at any time, and bulk-import aliases on a custom domain.', false],
                ['Failed deliveries', 'View, download and resend messages that could not be delivered.', true],
            ],
        ],
        [
            'id' => 'apps',
            'name' => 'Apps and integrations',
            'intro' => 'Create and manage aliases wherever you sign up for things.',
            'items' => [
                ['iOS and Android apps', 'Open-source mobile apps, free to use with addy.io or your own instance.', false],
                ['Browser extension', 'For Firefox, Chrome, Edge and Safari. Create an alias without leaving the page.', false],
                ['Works with Bitwarden', 'Bitwarden\'s generator can create an addy.io alias as it makes your password.', false],
                ['Webhooks', 'Trigger a webhook in your own tools when a rule matches an email.', true],
                ['Works with any email provider', 'Forward to Gmail, Outlook, Proton or any other inbox, and reply from the email app you already use.', false],
                ['Duo and Family sharing', 'Share a custom domain with members, or deliver an alias to another member without revealing anyone\'s email address.', true, true],
            ],
        ],
        [
            'id' => 'developers',
            'name' => 'Developers',
            'intro' => 'Automate everything, read the code, or run it yourself.',
            'items' => [
                ['REST API', 'Manage aliases, recipients, domains and usernames with an API key.', false],
                ['Open source', 'The app, browser extension and mobile apps are all public on GitHub.', false],
                ['Self-hosting', 'Run addy.io on your own server with the self-hosting guide.', false],
            ],
        ],
    ];
@endphp

@section('body')
<div class="mk">
  <section class="page-hero banded">
    <div class="wrap">
      <div class="eyebrow">// features</div>
      <h1 class="h1">Everything addy.io can do</h1>
      <p class="lead">Every feature in one place.<span data-pricing> Paid features are marked, so you know exactly what each plan unlocks.</span></p>
      <nav class="jump" aria-label="Feature categories">
        @foreach($categories as $category)
        <a href="#{{ $category['id'] }}">{{ $category['name'] }}</a>
        @endforeach
      </nav>
    </div>
  </section>

  @foreach($categories as $category)
  <section class="section feature-cat" id="{{ $category['id'] }}">
    <div class="wrap">
      <div class="cat-head">
        <div class="cat-copy">
          <div class="eyebrow">// {{ $category['id'] }}</div>
          <h2 class="h2">{{ $category['name'] }}</h2>
          <p class="lead">{{ $category['intro'] }}</p>
        </div>
        <div class="cat-art">
          @include('_partials.features.'.$category['id'])
        </div>
      </div>
      <div class="grid cat-items">
        @foreach($category['items'] as $item)
        @php([$title, $body, $paid] = $item)
        {{-- A fourth value of true hides the whole card in App Store mode --}}
        <div class="card" @if($item[3] ?? false) data-pricing @endif>
          <div class="item-head">
            <h3>{{ $title }}</h3>
            @if($paid)<span class="paid" data-pricing>Paid</span>@endif
          </div>
          {{-- Bodies are written here, so they may contain markup such as highlighted addresses --}}
          <p>{!! $body !!}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endforeach

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">Try it free. Upgrade when you need more.</h2>
        <p>Unlimited standard aliases on the free plan.<span data-pricing> Paid plans from <span class="currency-symbol">$</span>1/month.</span></p>
        <div class="final-ctas">
          <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="footer-cta">Get started free</a>
          <a class="btn btn-outline" data-pricing href="/pricing/" data-umami-event="pricing-click" data-umami-event-source="features-compare">Compare plans</a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
    fetch("{{ $page->appUrl }}/default-currency").then((e => e.json())).then((e => {
        [...document.getElementsByClassName("currency-symbol")].forEach((n => n.innerText = e.currency))
    }));
</script>
@endpush
