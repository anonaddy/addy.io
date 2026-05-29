<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($jigsaw->getCollection('posts')->map(function ($page) use ($jigsaw) {
            $content = strip_tags($page->getContent());
            $content = preg_replace('/\s+/', ' ', $content);
            $content = trim($content);

            return [
                'title' => $page->title,
                'snippet' => strip_tags($jigsaw->getConfig('getExcerpt')($page, 180)),
                'content' => $content,
                'categories' => $page->categories,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')).$page->getPath().'/', // add trailing slash
            ];
        })->values());

        file_put_contents($jigsaw->getDestinationPath().'/index.json', json_encode($data));
    }
}
