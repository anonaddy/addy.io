<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateHelpIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($jigsaw->getCollection('articles')->map(function ($page) use ($jigsaw) {
            return [
                'title' => $page->title,
                'categories' => $page->helpCategories,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')).$page->getPath(),
                'snippet' => $page->description,
            ];
        })->values());

        file_put_contents($jigsaw->getDestinationPath().'/help/index.json', json_encode($data));
    }
}
