<header class="flex items-center gradient lg:h-20 py-4" role="banner">
    <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
        <div class="flex items-center">
            <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                <img class="h-8 md:h-10 mr-3" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />
            </a>
        </div>

        <div class="flex flex-1 justify-end items-center">
            @include('_nav.menu')
        </div>
    </div>
</header>