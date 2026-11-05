---
title: "Email header analyser"
description: "Paste email headers to see an email's route, the delay at each hop, its SPF, DKIM and DMARC results, and whether the sender looks spoofed."
width: full
marketing: true
---

@extends('_layouts.master')

@section('body')
<div class="mk">
  <section class="page-hero banded">
    <div class="wrap">
      <nav aria-label="Breadcrumb" class="crumbs">
        <a href="/tools/">Tools</a>
        <span aria-hidden="true">/</span>
        <span aria-current="page">Email header analyser</span>
      </nav>
      <h1 class="h1">Email header analyser</h1>
      <p class="lead">See where an email really came from, how long it took to arrive, and whether it passed SPF, DKIM and DMARC.</p>

      <form class="tool-form" id="analyser" novalidate>
        <label for="header-text">Email headers or the full email source</label>
        <textarea id="header-text" rows="8" spellcheck="false" autocomplete="off" placeholder="Received: from mail.example.com ..."></textarea>
        <div class="tool-form-row">
          <p class="tool-form-note">Runs in your browser. Nothing you paste is sent anywhere.</p>
          <div class="ha-actions">
            <label class="ha-file">
              <input type="file" id="header-file" accept=".eml,.txt,message/rfc822">
              <span>Open .eml file</span>
            </label>
            <button type="button" class="ha-example" id="header-example">Try an example</button>
            <button type="submit" class="btn btn-primary press" data-umami-event="header-analyse">Analyse headers</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <section class="wrap ha-results" id="analyser-results" aria-live="polite"></section>

  <section class="section">
    <div class="wrap">
      <div class="eyebrow">// find your headers</div>
      <h2 class="h2">How to find an email's headers</h2>
      <div class="grid grid-3 ha-howto">
        <div class="card">
          <h3>Gmail</h3>
          <p>Open the email, click the three dots next to Reply and choose <b>Show original</b>. Copy everything, or click <b>Download original</b> for an .eml file.</p>
        </div>
        <div class="card">
          <h3>Outlook</h3>
          <p>Open the email, click the three dots and choose <b>View</b> then <b>View message details</b>. In the Windows app, go to <b>File</b> then <b>Properties</b>.</p>
        </div>
        <div class="card">
          <h3>Apple Mail</h3>
          <p>Open the email and choose <b>View</b> then <b>Message</b> then <b>Raw Source</b> from the menu bar.</p>
        </div>
        <div class="card">
          <h3>Proton Mail</h3>
          <p>Open the email, click the three dots and choose <b>View headers</b>.</p>
        </div>
        <div class="card">
          <h3>Yahoo Mail</h3>
          <p>Open the email, click the three dots and choose <b>View raw message</b>.</p>
        </div>
        <div class="card">
          <h3>Thunderbird</h3>
          <p>Open the email and press <b>Ctrl+U</b>, or <b>Cmd+U</b> on a Mac, to see the message source.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="wrap faq">
      <div class="eyebrow text-center">// questions</div>
      <h2 class="h2 text-center">Header questions</h2>
      <div class="faq-list">
        <details open><summary>What are email headers?</summary><p>Every email has two parts: the message you read, and a block of hidden lines at the top called headers. Your email app uses them to show who an email is from, who it's to, the subject and the date, but most apps hide the rest. The hidden lines record which mail servers the email passed through on its way to you, when it reached each one, and whether the sender passed security checks proving they are who they say they are. You don't need to understand them to use email, but they're useful when an email is late, goes missing or looks suspicious.</p></details>
        <details><summary>What do SPF, DKIM and DMARC mean?</summary><p>SPF checks the sending server is allowed to send for the domain in the envelope sender. DKIM checks a signature added by the sending domain, which proves the email wasn't changed on the way. DMARC checks that at least one of them passed for the same domain as the From address you see, and tells receivers what to do if not.</p></details>
        <details><summary>How can I tell if an email is spoofed?</summary><p>Look at DMARC first. If it failed, the From address may be forged. If SPF or DKIM passed but for a completely different domain to the From address, the email was sent by someone else on that company's behalf, or by someone pretending to be them. Phishing emails often pass SPF and DKIM for their own lookalike domain, so check the From domain carefully too.</p></details>
        <details><summary>Why are there several Received lines?</summary><p>Every mail server that handles an email adds a Received line to the top. Read them from the bottom up to follow the email from the sender to you. The time on each one shows when that server got it, so the gaps show where delays happened.</p></details>
        <details><summary>Can headers be faked?</summary><p>Some can. A sender can add fake Received lines below their own, but they can't change the lines added by servers after theirs, including your own provider's. That's why the authentication results at the top, added by your provider, are the ones to trust.</p></details>
      </div>
    </div>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">Keep your real address out of the headers</h2>
        <p>Give every website its own alias that forwards to your inbox, so your real address stays out of every company's records.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="header-analyser-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/header-analyser.js') }}"></script>
@endpush
