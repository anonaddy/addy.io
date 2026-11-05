---
title: "Free email tools"
description: "Free email tools from addy.io: find tracking pixels, analyse email headers, check SPF, DKIM and DMARC, and look up SMTP bounce codes. All in your browser."
width: full
marketing: true
---

@extends('_layouts.master')

@section('body')
<div class="mk">
  <section class="page-hero banded">
    <div class="wrap">
      <div class="eyebrow">// tools</div>
      <h1 class="h1">Free email tools</h1>
      <p class="lead">Find out if an email is tracking you, or work out why one bounced, was delayed or looks suspicious. Everything runs in your browser, so nothing you paste is sent anywhere.</p>
    </div>
  </section>

  <section class="section">
    <div class="wrap">
      <ul class="grid err-list tool-list">
        <li>
          <a class="card err-item" href="/tools/email-tracker-checker/">
            <span class="mono err-item-code">1×1 tracking pixels</span>
            <span class="err-item-name">Email tracker checker</span>
            <span class="err-item-meta">Find the hidden images that tell senders when and where you opened their email.</span>
          </a>
        </li>
        <li>
          <a class="card err-item" href="/tools/email-header-analyser/">
            <span class="mono err-item-code">Received · SPF · DKIM · DMARC</span>
            <span class="err-item-name">Email header analyser</span>
            <span class="err-item-meta">See the route an email took, the delay at each hop, and whether the sender passed authentication.</span>
          </a>
        </li>
        <li>
          <a class="card err-item" href="/smtp-errors/">
            <span class="mono err-item-code">550 5.1.1</span>
            <span class="err-item-name">SMTP error code lookup</span>
            <span class="err-item-meta">Paste a bounce message to find out what went wrong and who needs to fix it.</span>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">A different email address for every website</h2>
        <p>addy.io gives you unlimited aliases that forward to your real inbox. Turn one off the moment it gets spam.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="tools-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection
