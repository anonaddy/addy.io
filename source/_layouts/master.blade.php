<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="author" content="AnonAddy">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}" />
		<meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
		<meta property="og:url" content="{{ $page->getUrl() }}"/>
		<meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />
        <meta property="og:image" content="{{ $page->image ?? 'https://anonaddy.com/og-image.png' }}">
        <meta property="og:type" content="{{ $page->ogtype ?? 'website'}}" />
        <meta property="twitter:card" content="summary" />
		<meta property="twitter:site" content="@AnonAddy" />
		<meta property="twitter:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}" />
		<meta property="twitter:description" content="{{ $page->description ?? $page->siteDescription }}" />
		<meta property="twitter:image" content="{{ $page->image ?? 'https://anonaddy.com/og-image.png' }}" />
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#19216C">
        @stack('meta')

        <title>{{ $page->title ?  $page->title . ' - ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>

    <body class="{{ $page->isActive('/') ? 'gradient text-white' : 'flex flex-col justify-between min-h-screen bg-white text-grey-800' }} leading-normal font-sans">
        @include('_shared.header')

        @include('_nav.menu-mobile')

        <main class="{{ $page->isActive('/') ? '' : 'flex-auto w-full container py-16' }} {{ $page->width === 'full' ? '' : 'max-w-5xl' }}">
            @yield('body')
        </main>

        @include('_shared.footer')

        @stack('scripts')
        @if($page->isActive('/self-hosting'))
            <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
        @endif
    </body>
</html>
