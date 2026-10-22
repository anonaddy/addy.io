<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="addy.io">
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}" />
    <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}" />
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />
    <meta property="og:image" content="{{ $page->image ?? 'https://addy.io/og-image.png' }}">
    @unless($page->image)
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="addy.io: a different email address for every website">
    @endunless
    <meta property="og:type" content="{{ $page->ogtype ?? 'website'}}" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@addy_io" />
    <meta property="twitter:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}" />
    <meta property="twitter:description" content="{{ $page->description ?? $page->siteDescription }}" />
    <meta property="twitter:image" content="{{ $page->image ?? 'https://addy.io/og-image.png' }}" />

    @stack('meta')

    <title>{{ $page->title ?  $page->title . ' - ' : '' }}{{ $page->siteName }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">
    <link rel="canonical" href="{{ $page->getUrl() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#19216c">
    <meta name="msapplication-TileColor" content="#19216c">
    <meta name="theme-color" content="#19216c">

    <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

    {{-- Apply the saved or system colour theme before the page paints, so it never flashes the wrong theme --}}
    <script>
        (function () {
            var choice = 'system';
            try { choice = localStorage.getItem('theme') || 'system'; } catch (e) {}
            var dark = choice === 'dark' || (choice !== 'light' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            document.documentElement.classList.toggle('dark', dark);
            document.documentElement.setAttribute('data-theme-choice', choice);
        })();
    </script>

    {{-- App Store mode: links from the mobile apps add ?ref=appstore, and Apple rejects app builds that
         link to pages showing prices. Hide pricing before paint and remember the mode for this visit --}}
    <script>
        (function () {
            var appstore = new URLSearchParams(location.search).get('ref') === 'appstore';
            try {
                if (appstore) sessionStorage.setItem('ref', 'appstore');
                appstore = appstore || sessionStorage.getItem('ref') === 'appstore';
            } catch (e) {}
            if (!appstore) return;
            document.documentElement.classList.add('appstore');
            if (/^\/pricing(\/|$)/.test(location.pathname)) location.replace('/?ref=appstore');
        })();
    </script>

    <link rel="preload" href="/assets/fonts/plus-jakarta-sans-latin-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ $page->vite('source/_assets/css/main.css') }}">

    @if($page->production)
    <script type="module" src="{{ $page->vite('source/_assets/js/app.js') }}"></script>
    @endif
</head>

<body class="bg-canvas text-grey-800 dark:text-ink leading-normal font-sans">
    @include('_shared.header')

    <main class="{{ $page->isActive('/') || $page->marketing ? '' : 'flex-auto w-full container py-48' }} {{ $page->width === 'full' ? '' : 'max-w-5xl' }}">
        @yield('body')
    </main>

    @include('_shared.footer')

    @stack('scripts')
    <script type="module" src="{{ $page->vite('source/_assets/js/main.js') }}"></script>
    @if($page->isActive('/self-hosting') || ($page->highlightCode ?? false))
    @foreach($page->viteCss('source/_assets/js/highlight.js') as $css)
    <link rel="stylesheet" href="{{ $css }}">
    @endforeach
    <script type="module" src="{{ $page->vite('source/_assets/js/highlight.js') }}"></script>
    @endif
</body>

</html>