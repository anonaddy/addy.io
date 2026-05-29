<?php

use App\Listeners\GenerateCategoryPagination;
use App\Listeners\GenerateHelpIndex;
use App\Listeners\GenerateIndex;
use App\Listeners\GenerateSitemap;

// @var $container \Illuminate\Container\Container
// @var $events \TightenCo\Jigsaw\Events\EventBus

/*
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

$events->afterCollections(GenerateCategoryPagination::class);
$events->afterBuild(GenerateSitemap::class);
$events->afterBuild(GenerateIndex::class);
$events->afterBuild(GenerateHelpIndex::class);
