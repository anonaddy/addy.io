@extends('_layouts.master')

@php
    $suppressionLabels = [
        'high' => 'Senders often stop emailing the address',
        'medium' => 'Senders may stop emailing the address',
        'low' => 'Senders rarely stop emailing the address',
    ];
    $related = collect($page->related ?? [])
        ->map(fn ($slug) => $smtpErrors->first(fn ($error) => $error->getFilename() === $slug))
        ->filter();
@endphp

@section('body')
<div class="mk">
  <section class="page-hero banded err-hero">
    <div class="wrap">
      <nav aria-label="Breadcrumb" class="crumbs">
        <a href="/tools/">Tools</a>
        <span aria-hidden="true">/</span>
        <a href="/smtp-errors/">SMTP error codes</a>
        <span aria-hidden="true">/</span>
        <span aria-current="page">{{ trim($page->code.' '.$page->status) }}</span>
      </nav>
      <h1 class="h1">
        <span class="mono err-num">{{ trim($page->code.' '.$page->status) }}</span>
        <span class="err-name">{{ $page->name }}</span>
      </h1>
      <ul class="err-chips" aria-label="About this error">
        <li class="err-chip {{ $page->kind === 'temporary' ? 'is-temp' : 'is-perm' }}">{{ $page->kind === 'temporary' ? 'Temporary: the sender retries' : 'Permanent: the sender won\'t retry' }}</li>
        <li class="err-chip">{{ $suppressionLabels[$page->suppression] }}</li>
        @if($page->addy)
        <li class="err-chip is-addy">Sent by addy.io</li>
        @endif
      </ul>
    </div>
  </section>

  <section class="wrap err-layout">
    <article class="err-prose">
      <h2>What the message looks like</h2>
      <ul class="err-examples">
        @foreach($page->examples as $example)
        <li><code>{{ $example }}</code></li>
        @endforeach
      </ul>
      @yield('content')
    </article>

    <aside class="err-aside">
      <div class="card">
        <h2 class="err-aside-title">Got a different error?</h2>
        <p>Paste the whole bounce message to find the code and see what it means. It runs in your browser, so nothing you paste is sent anywhere.</p>
        <a class="text-link" href="/smtp-errors/#lookup">Explain a bounce message →</a>
      </div>
      @if($related->isNotEmpty())
      <div class="card">
        <h2 class="err-aside-title">Related errors</h2>
        <ul class="err-related">
          @foreach($related as $error)
          <li><a href="{{ $error->getPath() }}/"><span class="mono">{{ trim($error->code.' '.$error->status) }}</span> {{ $error->name }}</a></li>
          @endforeach
        </ul>
      </div>
      @endif
    </aside>
  </section>

  <section class="final">
    <div class="wrap">
      <div class="final-box">
        <h2 class="h2">Keep your real address out of bounce lists</h2>
        <p>Give every website its own alias. If one starts bouncing or getting spam, change it in seconds without touching your real inbox.</p>
        <a class="btn" href="{{ $page->appUrl }}/register" data-umami-event="signup-button" data-umami-event-source="smtp-error-cta">Get started free</a>
      </div>
    </div>
  </section>
</div>
@endsection
