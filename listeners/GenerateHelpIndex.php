<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateHelpIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = rightTrimPath($jigsaw->getConfig('baseUrl'));

        $articles = collect($jigsaw->getCollection('articles')->map(function ($page) use ($baseUrl) {
            $content = strip_tags($page->getContent());
            $content = preg_replace('/\s+/', ' ', trim($content));

            return [
                'title' => $page->title,
                'categories' => $page->helpCategories,
                'link' => $baseUrl.$page->getPath().'/',
                'snippet' => $page->description,
                'content' => $content,
            ];
        }));

        $faq = collect($this->faqIndexEntries($jigsaw, $baseUrl));

        $data = $articles->merge($faq)->values();

        file_put_contents($jigsaw->getDestinationPath().'/help/index.json', json_encode($data));
    }

    protected function faqIndexEntries(Jigsaw $jigsaw, string $baseUrl): array
    {
        $source = $jigsaw->readSourceFile('faq.md');

        if (! preg_match('/^---\s*\n.*?\n---\s*\n(.*)$/s', $source, $matches)) {
            return [];
        }

        $body = $matches[1];

        if (! preg_match_all('/^## (.+?) \s*\{#([^}]+)\}\s*\n(.*?)(?=^## |\z)/ms', $body, $sections, PREG_SET_ORDER)) {
            return [];
        }

        return collect($sections)->map(function (array $section) use ($baseUrl) {
            $title = trim($section[1]);
            $anchor = trim($section[2]);
            $content = $this->markdownToSearchText($section[3]);

            return [
                'title' => $title,
                'categories' => ['faq'],
                'link' => $baseUrl.'/faq/#'.$anchor,
                'snippet' => mb_strlen($content) > 180 ? mb_substr($content, 0, 177).'...' : $content,
                'content' => $content,
            ];
        })->all();
    }

    protected function markdownToSearchText(string $markdown): string
    {
        $text = preg_replace('/\[([^\]]+)\]\([^)]+\)/', '$1', $markdown);
        $text = preg_replace('/^>\s?/m', '', $text);
        $text = preg_replace('/[*_`#]/', '', $text);
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', trim($text));

        return $text;
    }
}
