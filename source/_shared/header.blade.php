<header class="absolute inset-x-0 top-0 z-50 {{ $page->isActive('/') ? '' : 'shadow' }}">
    <nav class="mx-auto flex max-w-7xl items-center justify-between gap-x-6 px-6 py-3 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">{{ $page->siteName }}</span>
                <img class="h-16 w-auto" src="/assets/img/logo-dark.svg" alt="{{ $page->siteName }} logo">
            </a>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            @foreach($page->menuItems as $item)
            <a title="{{ $item->title }}" href="{{ $item->href }}" class="text-grey-900 font-semibold hover:text-grey-700 {{ $page->isActive($item->href) ? 'active font-bold' : '' }}">{{ $item->title }}</a>
            @endforeach
        </div>
        <div class="flex flex-1 items-center justify-end gap-x-6">
            <a href="{{ $page->appUrl }}/login" class="hidden lg:block lg:text-sm lg:font-semibold lg:leading-6 lg:text-grey-900">Log in</a>
            <a href="{{ $page->appUrl }}/register" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign up</a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="mobile-menu-button -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-grey-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>
    <div id="mobile-menu" class="hidden lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-grey-900/10">
            <div class="flex items-center gap-x-6">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ $page->siteName }}</span>
                    <img class="h-8 w-auto" src="/icon.svg" alt="{{ $page->siteName }} icon">
                </a>
                <a href="{{ $page->appUrl }}/register" class="ml-auto rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign up</a>
                <button type="button" class="mobile-menu-button -m-2.5 rounded-md p-2.5 text-grey-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-grey-500/10">
                    <div class="space-y-2 py-6">
                        @foreach($page->menuItems as $item)
                        <a id="{{ strtolower($item->title).'-menu-item' }}" title="{{ $item->title }}" href="{{ $item->href }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-grey-900 hover:bg-grey-50 {{ $page->isActive($item->href) ? 'active font-bold' : '' }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                    <div class="py-6">
                        <a href="{{ $page->appUrl }}/login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-grey-900 hover:bg-grey-50">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>