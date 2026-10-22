@php
    $footerLink = 'text-[15px] text-muted hover:text-heading';
    $footerColumns = [
        'company' => [
            ['title' => 'Roadmap', 'href' => 'https://github.com/orgs/anonaddy/projects/1/views/1', 'external' => true],
            ['title' => 'Brand', 'href' => '/brand/'],
            ['title' => 'Perks', 'href' => '/perks/', 'badge' => 'New'],
            ['title' => 'Privacy', 'href' => '/privacy/'],
            ['title' => 'Terms', 'href' => '/terms/'],
        ],
        'development' => [
            ['title' => 'Changelog', 'href' => '/changelog/'],
            ['title' => 'Security', 'href' => '/security/'],
            ['title' => 'API', 'href' => $page->appUrl.'/docs/'],
            ['title' => 'Self-hosting', 'href' => '/self-hosting/'],
            ['title' => 'Donate', 'href' => '/donate/'],
        ],
        'support' => [
            ['title' => 'FAQ', 'href' => '/faq/'],
            ['title' => 'Help Centre', 'href' => '/help/'],
            ['title' => 'Contact', 'href' => '/contact/'],
            ['title' => 'Status', 'href' => 'https://status.addy.io/'],
        ],
    ];
@endphp
<footer class="border-t border-line bg-subtle">
    <div class="mx-auto max-w-[75rem] px-6 pt-14 pb-8">
        <div class="grid gap-12 lg:grid-cols-[1.3fr_2fr]">
            <div class="max-w-sm">
                <a href="/" class="inline-block">
                    <span class="sr-only">{{ $page->siteName }}</span>
                    <img class="h-12 w-auto dark:hidden" src="/assets/img/logo-dark.svg" alt="" width="118" height="48" loading="lazy">
                    <img class="hidden h-12 w-auto dark:block" src="/assets/img/logo.svg" alt="" width="118" height="48" loading="lazy">
                </a>
                <p class="mt-3 text-[15px] text-muted">Free, open-source anonymous email forwarding.</p>

                <form action="{{ $page->appUrl }}/newsletter/subscribe" method="POST" accept-charset="utf-8" class="footer-newsletter mt-8">
                    <p class="text-[15px] font-bold text-heading">Product news and updates</p>
                    <p class="mt-1 text-sm text-muted">Occasional emails, no spam. Unsubscribe any time.</p>
                    <div class="mt-3 flex gap-2">
                        <label for="footer-newsletter-email" class="sr-only">Email address</label>
                        <input type="email" id="footer-newsletter-email" name="email" class="min-w-0 flex-1 rounded-[10px] border border-line bg-card px-3 py-2.5 text-[15px] text-ink placeholder:text-muted focus:border-link focus:outline-none focus:ring-2 focus:ring-link/30" placeholder="you@example.com" autocomplete="email" required>
                        <button type="submit" class="press shrink-0 cursor-pointer rounded-[10px] bg-accent px-4 py-2.5 text-[15px] font-bold text-on-accent hover:opacity-90" data-umami-event="newsletter-submit" data-umami-event-source="newsletter-form-footer">Notify me</button>
                    </div>
                    <div class="hidden" aria-hidden="true">
                        <label for="footer-hp">HP</label>
                        <input type="text" name="hp" id="footer-hp" tabindex="-1" autocomplete="off">
                    </div>
                    {{-- Turnstile is only loaded once someone focuses the email field, so no third-party request is made on every page view --}}
                    <div class="footer-turnstile mt-2" data-sitekey="{{ $page->turnstileNewsletterSiteKey }}"></div>
                </form>
            </div>

            <div class="grid grid-cols-2 gap-10 sm:grid-cols-3">
                @foreach($footerColumns as $heading => $links)
                <div>
                    <p class="font-mono text-[13px] text-code">// {{ $heading }}</p>
                    <ul class="mt-4 space-y-3">
                        @foreach($links as $link)
                        <li class="flex items-center gap-2">
                            <a href="{{ $link['href'] }}" class="{{ $footerLink }} {{ $page->isActive($link['href']) ? 'active font-bold text-heading' : '' }}" @if($link['external'] ?? false) target="_blank" rel="nofollow noreferrer noopener" @endif>{{ $link['title'] }}</a>
                            @if($link['badge'] ?? false)
                            <span class="rounded-md bg-tint-cyan px-1.5 py-0.5 text-xs font-semibold text-code">{{ $link['badge'] }}</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-14 flex flex-col gap-6 border-t border-line pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-muted">&copy; {{ date('Y') }} {{ $page->siteName }}</p>
            <div class="flex items-center gap-5 text-muted">
                <a href="https://github.com/anonaddy" target="_blank" rel="nofollow noreferrer noopener" class="hover:text-heading" title="addy.io GitHub">
                    <span class="sr-only">GitHub</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="22" height="22" class="fill-current" aria-hidden="true">
                        <path d="M18.88 1.099C18.147.366 17.265 0 16.233 0H3.746C2.714 0 1.832.366 1.099 1.099.366 1.832 0 2.714 0 3.746v12.487c0 1.032.366 1.914 1.099 2.647.733.733 1.615 1.099 2.647 1.099H6.66c.19 0 .333-.007.429-.02a.504.504 0 0 0 .286-.169c.095-.1.143-.245.143-.435l-.007-.885c-.004-.564-.006-1.01-.006-1.34l-.3.052c-.19.035-.43.05-.721.046a5.555 5.555 0 0 1-.904-.091 2.026 2.026 0 0 1-.872-.39 1.651 1.651 0 0 1-.572-.8l-.13-.3a3.25 3.25 0 0 0-.41-.663c-.186-.243-.375-.407-.566-.494l-.09-.065a.956.956 0 0 1-.17-.156.723.723 0 0 1-.117-.182c-.026-.061-.004-.111.065-.15.07-.04.195-.059.378-.059l.26.04c.173.034.388.138.643.311a2.1 2.1 0 0 1 .631.677c.2.355.44.626.722.813.282.186.566.28.852.28.286 0 .533-.022.742-.065a2.59 2.59 0 0 0 .585-.196c.078-.58.29-1.028.637-1.34a8.907 8.907 0 0 1-1.333-.234 5.314 5.314 0 0 1-1.223-.507 3.5 3.5 0 0 1-1.047-.872c-.277-.347-.505-.802-.683-1.365-.177-.564-.266-1.215-.266-1.952 0-1.049.342-1.942 1.027-2.68-.32-.788-.29-1.673.091-2.652.252-.079.625-.02 1.119.175.494.195.856.362 1.086.5.23.14.414.257.553.352a9.233 9.233 0 0 1 2.497-.338c.859 0 1.691.113 2.498.338l.494-.312a6.997 6.997 0 0 1 1.197-.572c.46-.174.81-.221 1.054-.143.39.98.424 1.864.103 2.653.685.737 1.028 1.63 1.028 2.68 0 .737-.089 1.39-.267 1.957-.177.568-.407 1.023-.689 1.366-.282.343-.633.63-1.053.865-.42.234-.828.403-1.223.507a8.9 8.9 0 0 1-1.333.235c.45.39.676 1.005.676 1.846v3.11c0 .147.021.266.065.357a.36.36 0 0 0 .208.189c.096.034.18.056.254.064.074.01.18.013.318.013h2.914c1.032 0 1.914-.366 2.647-1.099.732-.732 1.099-1.615 1.099-2.647V3.746c0-1.032-.367-1.914-1.1-2.647z"></path>
                    </svg>
                </a>
                <a href="https://x.com/addy_io" target="_blank" rel="nofollow noreferrer noopener" class="hover:text-heading" title="addy.io on X">
                    <span class="sr-only">X</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="fill-current" aria-hidden="true">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
                    </svg>
                </a>
                <a href="https://reddit.com/r/addy_io" target="_blank" rel="nofollow noreferrer noopener" class="hover:text-heading" title="addy.io Reddit">
                    <span class="sr-only">Reddit</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" class="fill-current" aria-hidden="true">
                        <path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 3.174.913.69 0 2.332-.07 3.174-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.739.73-1.055 0-2.192-.197-2.739-.73a.326.326 0 0 0-.232-.095z"/>
                    </svg>
                </a>
                <a href="/blog/feed.atom" target="_blank" rel="nofollow noreferrer noopener" class="hover:text-heading" title="addy.io Blog Feed">
                    <span class="sr-only">RSS feed</span>
                    <svg viewBox="0 0 24 24" width="22" height="22" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 11a9 9 0 0 1 9 9"></path>
                        <path d="M4 4a16 16 0 0 1 16 16"></path>
                        <circle cx="5" cy="19" r="1"></circle>
                    </svg>
                </a>
                <label class="ml-2 flex items-center gap-2 text-sm">
                    <span class="sr-only sm:not-sr-only">Theme</span>
                    <select id="theme-select" class="cursor-pointer rounded-lg border border-line bg-card py-1.5 pr-8 pl-2.5 text-sm text-ink">
                        <option value="system">System</option>
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
</footer>
