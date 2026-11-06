---
title: "Email tracker checker"
description: "Is this email tracking you? Paste an email's source or open an .eml file to find the tracking pixels in it and see who's watching when you open it."
image: https://addy.io/assets/img/share/email-tracker-checker.png
imageAlt: "Email tracker checker from addy.io finding 4 tracking pixels in an email"
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
        <span aria-current="page">Email tracker checker</span>
      </nav>
      <h1 class="h1">Is this email tracking you?</h1>
      <p class="lead">Find the hidden tracking pixels that tell senders when you opened their email, where you were and which device you used.</p>

      <form class="tool-form" id="checker" novalidate>
        <label for="source-text">The full source of an email, or its HTML</label>
        <textarea id="source-text" rows="8" spellcheck="false" autocomplete="off" placeholder="From: news@shop.example ..."></textarea>
        <div class="tool-form-row">
          <p class="tool-form-note">Runs in your browser. Nothing you paste is sent anywhere.</p>
          <div class="ha-actions">
            <label class="ha-file">
              <input type="file" id="source-file" accept=".eml,.txt,.html,.htm,message/rfc822">
              <span>Open .eml file</span>
            </label>
            <button type="button" class="ha-example" id="source-example">Try an example</button>
            <button type="submit" class="btn btn-primary press" data-umami-event="tracker-check">Check for trackers</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <section class="wrap ha-results" id="checker-results" aria-live="polite"></section>

  <section class="section">
    <div class="wrap">
      <div class="eyebrow">// find the source</div>
      <h2 class="h2">How to get an email's source</h2>
      <div class="grid grid-3 ha-howto">
        <div class="card">
          <h3>Gmail</h3>
          <p>Open the email, click the three dots next to Reply and choose <b>Show original</b>. Click <b>Copy to clipboard</b>, or <b>Download original</b> for an .eml file.</p>
        </div>
        <div class="card">
          <h3>Outlook</h3>
          <p>Open the email, click the three dots and choose <b>View</b> then <b>View message source</b>. In the Windows app, save the email and open the file here.</p>
        </div>
        <div class="card">
          <h3>Apple Mail</h3>
          <p>Open the email and choose <b>View</b> then <b>Message</b> then <b>Raw Source</b> from the menu bar, or drag the email to your desktop to save an .eml file.</p>
        </div>
        <div class="card">
          <h3>Proton Mail</h3>
          <p>Open the email, click the three dots and choose <b>Export</b> to download an .eml file, then open it here.</p>
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
      <h2 class="h2 text-center">Tracking questions</h2>
      <div class="faq-list">
        <details open><summary>What is a tracking pixel?</summary><p>A tracking pixel is a tiny image, usually 1 pixel by 1 pixel and invisible, hidden in an email. Each copy of the email gets its own image address. When your email app loads it, the sender's server sees the request and records that you opened the email, along with the time, your IP address and your email app. Most newsletters and marketing emails include one.</p></details>
        <details><summary>How does this checker find trackers?</summary><p>It uses the same rules addy.io uses to remove trackers from forwarded emails. It looks at every image in the email's HTML and flags images from known tracking services, images whose address is used to record opens, like <span class="mono">/open</span> or <span class="mono">/track</span>, and images 2×2 pixels or smaller. Normal images such as logos and photos are left alone.</p></details>
        <details><summary>Can emails track me in other ways?</summary><p>Yes. Most marketing emails also send links through a tracking address first, so the sender knows which links you clicked. This checker only looks for tracking images, because that's what addy.io removes. A tracking image that's a normal size and comes from the sender's own server also won't be found.</p></details>
        <details><summary>Does blocking images stop tracking?</summary><p>Mostly, yes. If your email app doesn't load images, tracking pixels can't report an open. Gmail loads images through its own proxy, which hides your IP address and device, but the sender still sees when you opened the email. Apple Mail Privacy Protection loads images in advance, which hides your IP address but can make every email look opened.</p></details>
        <details><summary>How does addy.io block tracking pixels?</summary><p>When an email arrives at one of your aliases, addy.io removes tracking pixels from it before forwarding it to your inbox<span data-pricing> on the Lite and Pro plans</span>. The email banner shows how many were removed, with a link to a report. See <a href="/help/blocking-tracking-pixels-in-forwarded-emails/">Blocking tracking pixels in forwarded emails</a>.</p></details>
      </div>
    </div>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">Let addy.io remove them for you</h2>
        <p>Give every website its own alias. addy.io forwards their emails to your inbox and strips out tracking pixels on the way<span data-pricing> on paid plans</span>.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="tracker-checker-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/tracker-checker.js') }}"></script>
@endpush
