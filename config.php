<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://localhost:3000/',
    'appUrl' => 'https://app.addy.io',
    'production' => false,
    'siteName' => 'addy.io',
    'siteDescription' => 'Create unlimited email aliases for free. Protect your real email from spam by using a different address for each service. Privacy friendly, anonymous replies.',
    'siteAuthor' => 'addy.io',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Will Browning', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => 'blog/{filename}',
        ],
        'articles' => [
            'author' => 'Will Browning', // Default author, if not provided in a post
            'sort' => 'title',
            'path' => 'help/{filename}',
        ],
        'helpCategories' => [
            'path' => '/help/category/{filename}',
            'articles' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->helpCategories ? in_array($page->getFilename(), $post->helpCategories, true) : false;
                });
            },
        ],
        'newsletter' => [
            'path' => 'newsletters/{filename}',
        ],
        'changelogs' => [
            'sort' => '-date',
            'path' => 'changelog/{filename}',
        ],
    ],

    'menuItems' => [
        [
            'title' => 'Help',
            'href' => '/help/',
        ],
        [
            'title' => 'FAQ',
            'href' => '/faq/',
        ],
        [
            'title' => 'Blog',
            'href' => '/blog/',
        ],
        [
            'title' => 'Pricing',
            'href' => '/#pricing',
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        $content = $page->excerpt ?? $page->getContent();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>'
        );

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated).'...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith($page->getUrl(), $path);
    },
    'startsWith' => function ($page, $needle) {
        if ($needle !== '' && substr($page->getUrl(), 0, strlen($needle)) === (string) $needle) {
            return true;
        }

        return false;
    },
    'vite' => function ($page, $entry) {
        $manifestPath = __DIR__.'/source/assets/build/manifest.json';

        $readManifest = function () use ($manifestPath) {
            if (! file_exists($manifestPath)) {
                return [];
            }

            $decoded = json_decode(file_get_contents($manifestPath), true);

            return is_array($decoded) ? $decoded : [];
        };

        $manifest = $readManifest();

        // During watch builds Vite may rewrite the manifest while Jigsaw reads it.
        // Retry once to avoid failing on a transient partial read.
        if (! isset($manifest[$entry]['file'])) {
            usleep(100000);
            $manifest = $readManifest();
        }

        if (! isset($manifest[$entry]['file'])) {
            throw new RuntimeException("Vite manifest entry not found for: {$entry}");
        }

        return '/assets/build/'.$manifest[$entry]['file'];
    },
    'viteCss' => function ($page, $entry) {
        $manifestPath = __DIR__.'/source/assets/build/manifest.json';

        if (! file_exists($manifestPath)) {
            return [];
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (! is_array($manifest) || ! isset($manifest[$entry])) {
            usleep(100000);
            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

        if (! is_array($manifest) || ! isset($manifest[$entry])) {
            return [];
        }

        return array_map(
            fn ($css) => '/assets/build/'.$css,
            $manifest[$entry]['css'] ?? []
        );
    },
];
