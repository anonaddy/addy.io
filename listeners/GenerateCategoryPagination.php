<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use TightenCo\Jigsaw\Jigsaw;

class GenerateCategoryPagination
{
    public function handle(Jigsaw $jigsaw)
    {
        $this->ensureCategoryIndexPagesExist($jigsaw);
        $this->syncPaginatedCategorySourcePages($jigsaw);
    }

    private function ensureCategoryIndexPagesExist(Jigsaw $jigsaw): void
    {
        $posts = $jigsaw->getCollection('posts');
        $categories = $posts
            ->flatMap(function ($post) {
                return $post->categories ?? [];
            })
            ->filter()
            ->unique()
            ->values();

        foreach ($categories as $category) {
            $category = (string) $category;
            $sourceDirectory = __DIR__.'/../source/blog/category/'.$category;
            $sourcePath = $sourceDirectory.'/index.blade.php';

            if (file_exists($sourcePath)) {
                continue;
            }

            if (! is_dir($sourceDirectory)) {
                mkdir($sourceDirectory, 0755, true);
            }

            $title = Str::title(str_replace('-', ' ', $category));
            $description = "Browse all {$title} posts on addy.io.";

            $contents = <<<BLADE
---
extends: _layouts.category
title: {$title}
description: {$description}
path: /blog/category/{$category}
category: {$category}
---

BLADE;

            file_put_contents($sourcePath, $contents);
        }
    }

    private function syncPaginatedCategorySourcePages(Jigsaw $jigsaw): void
    {
        $perPage = 10;
        $posts = $jigsaw->getCollection('posts');
        $categories = $posts
            ->flatMap(function ($post) {
                return $post->categories ?? [];
            })
            ->filter()
            ->unique()
            ->values();

        foreach ($categories as $category) {
            $category = (string) $category;
            $categoryPosts = $posts->filter(function ($post) use ($category) {
                return $post->categories ? in_array($category, $post->categories, true) : false;
            });

            $totalPages = (int) ceil($categoryPosts->count() / $perPage);
            $sourceDirectory = __DIR__.'/../source/blog/category/'.$category;

            for ($page = 2; $page <= $totalPages; $page++) {
                $sourcePath = $sourceDirectory.'/'.$page.'.blade.php';
                if (! file_exists($sourcePath)) {
                    file_put_contents($sourcePath, $this->buildPaginatedCategoryPageTemplate($category, $page));
                }
            }

            $this->removeExtraPaginationSourcePages($sourceDirectory, max(1, $totalPages));
        }
    }

    private function removeExtraPaginationSourcePages(string $sourceDirectory, int $totalPages): void
    {
        $paginationPages = glob($sourceDirectory.'/*.blade.php') ?: [];

        foreach ($paginationPages as $paginationPage) {
            $pageName = basename($paginationPage, '.blade.php');

            if (! ctype_digit($pageName) || (int) $pageName <= $totalPages) {
                continue;
            }

            unlink($paginationPage);
        }
    }

    private function buildPaginatedCategoryPageTemplate(string $category, int $page): string
    {
        return <<<BLADE
---
extends: _layouts.category
path: /blog/category/{$category}/{$page}
category: {$category}
---

BLADE;
    }
}
