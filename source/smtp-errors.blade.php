---
title: "SMTP error codes explained"
description: "Paste a bounce message to see what went wrong, or look up common SMTP error codes like 550 5.1.1 and 552 5.2.2, with fixes for recipients and senders."
width: full
marketing: true
---

@extends('_layouts.master')

@php
    $groups = collect($page->smtpGroups)->map(fn ($label, $key) => [
        'label' => $label,
        'errors' => $smtpErrors->filter(fn ($error) => $error->group === $key)->sortBy(fn ($error) => $error->status.' '.$error->code),
    ]);
@endphp

@section('body')
<div class="mk">
  <section class="page-hero banded">
    <div class="wrap">
      <nav aria-label="Breadcrumb" class="crumbs">
        <a href="/tools/">Tools</a>
        <span aria-hidden="true">/</span>
        <span aria-current="page">SMTP error codes</span>
      </nav>
      <h1 class="h1">SMTP error codes, explained</h1>
      <p class="lead">Paste a bounce message to find out why your email didn't arrive, or browse the most common codes below.</p>

      <form class="tool-form" id="lookup" novalidate>
        <label for="bounce-text">Bounce message or error code</label>
        <textarea id="bounce-text" rows="6" spellcheck="false" autocomplete="off" placeholder="e.g. 550 5.1.1 Recipient address rejected: Address does not exist"></textarea>
        <div class="tool-form-row">
          <p class="tool-form-note">Runs in your browser. Nothing you paste is sent anywhere.</p>
          <button type="submit" class="btn btn-primary press" data-umami-event="smtp-lookup">Explain this error</button>
        </div>
      </form>
      <div class="err-results" id="lookup-results" aria-live="polite"></div>
    </div>
  </section>

  <section class="section">
    <div class="wrap">
      <div class="eyebrow">// how to read a code</div>
      <h2 class="h2">What the numbers mean</h2>
      <div class="grid grid-3 err-anatomy">
        <div class="card">
          <h3><span class="mono">550</span> The reply code</h3>
          <p>The first number. <span class="mono">2xx</span> means it worked, <span class="mono">4xx</span> means try again later, and <span class="mono">5xx</span> means it failed for good.</p>
        </div>
        <div class="card">
          <h3><span class="mono">5.1.1</span> The status code</h3>
          <p>A more detailed status. The middle number says what kind of problem it is: 1 is the address, 2 the mailbox, 3 the mail system, 4 the network, 5 the protocol, 6 the content and 7 security or policy.</p>
        </div>
        <div class="card">
          <h3>The text after it</h3>
          <p>Each server writes its own explanation, and it often says more than the numbers. Look for a reason, the name of a blocklist, or a link.</p>
        </div>
      </div>
    </div>
  </section>

  @foreach($groups as $key => $group)
  @if($group['errors']->isNotEmpty())
  <section class="section err-group" id="{{ $key }}">
    <div class="wrap">
      <h2 class="h2">{{ $group['label'] }}</h2>
      <ul class="grid err-list">
        @foreach($group['errors'] as $error)
        <li>
          <a class="card err-item" href="{{ $error->getPath() }}/" data-smtp-entry data-code="{{ $error->code }}" data-status="{{ $error->status }}" data-name="{{ $error->name }}" data-kind="{{ $error->kind }}" data-match="{{ implode('|', $error->match ?? []) }}">
            <span class="mono err-item-code">{{ trim($error->code.' '.$error->status) }}</span>
            <span class="err-item-name">{{ $error->name }}</span>
            <span class="err-item-meta">{{ $error->kind === 'temporary' ? 'Temporary' : 'Permanent' }}@if($error->addy) · Sent by addy.io @endif</span>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  @endif
  @endforeach

  <section class="section">
    <div class="wrap faq">
      <div class="eyebrow text-center">// questions</div>
      <h2 class="h2 text-center">Bounce questions</h2>
      <div class="faq-list">
        <details open><summary>What's the difference between a hard and a soft bounce?</summary><p>A hard bounce is a permanent failure, usually a <span class="mono">5xx</span> code such as an address that doesn't exist. The sender's server gives up straight away. A soft bounce is temporary, usually a <span class="mono">4xx</span> code such as a full mailbox or a busy server, and the sender's server keeps retrying for a few days before giving up.</p></details>
        <details><summary>What is a suppression list?</summary><p>Most newsletter and email sending services keep a list of addresses that have hard bounced, and stop sending to them to protect their reputation. If your address bounced even once, a sender may keep skipping it after it starts working again. Ask them to remove it from their suppression list, or give them a new address.</p></details>
        <details><summary>The address is right, so why did my email bounce?</summary><p>Plenty of bounces have nothing to do with the address. The receiving server might think the email is spam, the sender's domain might be missing SPF, DKIM or DMARC records, the mailbox might be full, or the sending server might be on a blocklist. The status code and the text after it tell you which.</p></details>
        <details><summary>Who has to fix it?</summary><p>It depends on the code. Address and mailbox problems (<span class="mono">5.1.x</span> and <span class="mono">5.2.x</span>) are usually fixed by the recipient. Authentication and policy problems (<span class="mono">5.7.x</span>) are almost always fixed by the sender or their email provider. Each page above says who needs to do what.</p></details>
      </div>
    </div>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">A different email address for every website</h2>
        <p>addy.io gives you unlimited aliases that forward to your real inbox. Turn one off the moment it gets spam.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="smtp-errors-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/smtp-errors.js') }}"></script>
@endpush
