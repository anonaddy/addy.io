<header class="absolute inset-x-0 top-0 z-50 bg-canvas {{ $page->isActive('/') ? 'border-b border-line' : 'shadow dark:shadow-none dark:border-b dark:border-line' }}">
    <nav class="mx-auto flex max-w-[75rem] items-center justify-between gap-x-6 px-6 py-3" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" id="addy-io-logo-link" class="-m-1.5 p-1.5">
                <span class="sr-only">{{ $page->siteName }}</span>
                <img class="h-14 w-auto dark:hidden" src="/assets/img/logo-dark.svg" alt="" width="137" height="56">
                <img class="hidden h-14 w-auto dark:block" src="/assets/img/logo.svg" alt="" width="137" height="56">
            </a>
        </div>
        <div class="hidden lg:flex lg:gap-x-10">
            @foreach($page->menuItems as $item)
            <a title="{{ $item->title }}" href="{{ $item->href }}" id="{{ strtolower($item->title) }}-nav-link" class="text-[15px] {{ $page->isActive($item->href) ? 'active font-bold text-heading' : 'font-medium text-muted hover:text-heading' }}" @if($item->href === '/pricing/') data-pricing data-umami-event="pricing-click" data-umami-event-source="header-nav" @endif>{{ $item->title }}</a>
            @endforeach
        </div>
        <div class="flex flex-1 items-center justify-end gap-x-3">
            <button type="button" class="theme-toggle cursor-pointer hidden size-11 items-center justify-center rounded-[10px] border border-line bg-card text-ink lg:inline-flex" aria-label="Switch colour theme">
                <svg class="size-5 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z" />
                </svg>
                <svg class="hidden size-5 dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="4" />
                    <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4" />
                </svg>
            </button>
            <a href="{{ $page->appUrl }}/login" class="hidden whitespace-nowrap px-3 py-2.5 text-[15px] font-semibold text-muted hover:text-heading lg:block" data-umami-event="login-button" data-umami-event-source="header-nav">Log in</a>
            <a href="{{ $page->appUrl }}/register" class="press whitespace-nowrap rounded-[10px] bg-accent px-4 py-2.5 text-sm font-bold text-on-accent hover:opacity-90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-link sm:text-[15px]" data-umami-event="signup-button" data-umami-event-source="header-nav">Get started free</a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="mobile-menu-button cursor-pointer -m-2.5 inline-flex size-11 items-center justify-center rounded-[10px] text-ink" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>
    <div id="mobile-menu" class="hidden lg:hidden" role="dialog" aria-modal="true" aria-label="Main menu">
        <div class="fixed inset-0 z-10 bg-grey-900/30"></div>
        <div class="mobile-menu-panel fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-canvas px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-line">
            <div class="flex items-center gap-x-6">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ $page->siteName }}</span>
                    <img class="h-8 w-auto" src="/icon.svg" alt="" width="32" height="32">
                </a>
                <a href="{{ $page->appUrl }}/register" class="press ml-auto rounded-[10px] bg-accent px-4 py-2.5 text-sm font-bold text-on-accent" data-umami-event="signup-button" data-umami-event-source="header-nav">Get started free</a>
                <button type="button" class="mobile-menu-button cursor-pointer -m-2.5 inline-flex size-11 items-center justify-center rounded-[10px] text-ink">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-line">
                    <div class="space-y-1 py-6">
                        @foreach($page->menuItems as $item)
                        <a id="{{ strtolower($item->title).'-menu-item' }}" title="{{ $item->title }}" href="{{ $item->href }}" class="-mx-3 block rounded-lg px-3 py-3 text-base text-ink hover:bg-subtle {{ $page->isActive($item->href) ? 'active font-bold' : 'font-semibold' }}" @if($item->href === '/pricing/') data-pricing data-umami-event="pricing-click" data-umami-event-source="header-nav" @endif>{{ $item->title }}</a>
                        @endforeach
                    </div>
                    <div class="space-y-1 py-6">
                        <a href="{{ $page->appUrl }}/login" class="-mx-3 block rounded-lg px-3 py-3 text-base font-semibold text-ink hover:bg-subtle" data-umami-event="login-button" data-umami-event-source="header-nav">Log in</a>
                        <button type="button" class="theme-toggle cursor-pointer -mx-3 block w-[calc(100%+1.5rem)] rounded-lg px-3 py-3 text-left text-base font-semibold text-ink hover:bg-subtle">
                            <span class="dark:hidden">Switch to dark mode</span>
                            <span class="hidden dark:inline">Switch to light mode</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
