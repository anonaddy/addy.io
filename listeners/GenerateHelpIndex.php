<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateHelpIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($jigsaw->getCollection('articles')->map(function ($page) use ($jigsaw) {
            // Get the content and strip HTML tags for cleaner search
            $content = strip_tags($page->getContent());
            // Remove extra whitespace and normalize
            $content = preg_replace('/\s+/', ' ', trim($content));

            return [
                'title' => $page->title,
                'categories' => $page->helpCategories,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')).$page->getPath().'/', // add trailing slash
                'snippet' => $page->description,
                'content' => $content,
            ];
        })->values());

        file_put_contents($jigsaw->getDestinationPath().'/help/index.json', json_encode($data));
    }
}
