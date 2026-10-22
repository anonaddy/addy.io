<div class="flex justify-center lg:-mx-12 my-12 p-6 md:px-12 bg-grey-50 dark:bg-subtle border border-grey-400 dark:border-line text-sm md:rounded shadow">

    <form action="{{ $page->appUrl }}/newsletter/subscribe" method="POST" accept-charset="utf-8" class="w-full max-w-md">
        <h2 class="text-center text-xl font-bold text-grey-800 dark:text-ink mb-4">Sign up for our newsletter</h2>

        <div class="flex flex-col items-center gap-3">
            <label for="newsletter-email" class="hidden">Email Address</label>
            <input type="email" id="newsletter-email" value="" name="email" class="appearance-none bg-white dark:bg-card shadow border-none w-full text-grey-700 dark:text-ink py-2 px-3" aria-label="Email Address" placeholder="you@example.com" autocomplete="email" required>
            <div class="hidden" aria-hidden="true">
                <label for="hp">HP</label>
                <input type="text" name="hp" id="hp" tabindex="-1" autocomplete="off">
            </div>

            <div class="cf-turnstile" data-sitekey="{{ $page->turnstileNewsletterSiteKey }}" data-action="newsletter" data-theme="auto" data-size="flexible" data-appearance="interaction-only"></div>

            <input type="submit" value="Update Me!" class="shrink-0 bg-white dark:bg-card text-sm cursor-pointer text-indigo-500 dark:text-link py-2 px-4 rounded-full font-bold shadow" data-umami-event="newsletter-submit" data-umami-event-source="newsletter-form-blog">
        </div>
    </form>
</div>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" defer></script>
