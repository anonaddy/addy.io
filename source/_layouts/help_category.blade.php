@extends('_layouts.help_centre')

@section('helpContent')
    <!-- Breadcrumbs -->
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm text-grey-600">
            <li>
                <a href="/help/" class="hover:text-indigo-600 transition-colors">All Categories</a>
            </li>
            <li>
                <svg class="w-4 h-4 text-grey-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </li>
            <li class="text-grey-900 font-medium" aria-current="page">
                {{ $page->title }}
            </li>
        </ol>
    </nav>

    <!-- Category Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-grey-900 mb-3">{{ $page->title }}</h2>
    </div>

    <!-- Category Description -->
    @hasSection('content')
        <div class="mb-10 text-lg text-grey-600 leading-relaxed">
            @yield('content')
        </div>
    @elseif($page->description)
        <div class="mb-10 text-lg text-grey-600 leading-relaxed">
            {{ $page->description }}
        </div>
    @endif

    <!-- Articles List -->
    @if(count($page->articles($articles)))
        @php
            $sortedArticles = collect($page->articles($articles))->sortBy(function($article) {
                return [
                    $article->order ?? 999,
                    $article->title ?? ''
                ];
            })->values();
        @endphp

        <div class="space-y-4">
            @foreach ($sortedArticles as $article)
                <a
                    href="{{ $article->getUrl() }}/"
                    title="Read more - {{ $article->title }}"
                    class="group block bg-white border border-grey-200 rounded-lg p-6 hover:border-indigo-300 hover:shadow-md transition-all duration-200"
                >
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-grey-900 group-hover:text-indigo-600 transition-colors mb-2">
                                {{ $article->title }}
                            </h4>
                            @if($article->description)
                                <p class="text-grey-600 text-sm line-clamp-2">
                                    {{ $article->description }}
                                </p>
                            @endif
                            <div class="flex items-center flex-wrap gap-3 mt-3">
                                <div class="flex items-center text-sm text-grey-500">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Last updated: {{ date('F j, Y', $article->date) }}</span>
                                </div>
                                @if($article->advanced)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                        Advanced
                                    </span>
                                @endif
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-grey-400 group-hover:text-indigo-600 transition-colors flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>

    @else

        <div class="text-center py-16">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-grey-100 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-name="Layer 1" width="60" height="60" viewBox="0 0 814 778.22" class="text-grey-400" alt="Documents">
                    <defs>
                        <linearGradient id="29b91a8c-5031-4728-9934-4de601869dbd" x1="253.26" y1="778.22" x2="253.26" y2="105.1" gradientUnits="userSpaceOnUse">
                            <stop offset="0.01" stop-color="gray" stop-opacity="0.25"></stop>
                            <stop offset="0.54" stop-color="gray" stop-opacity="0.12"></stop>
                            <stop offset="1" stop-color="gray" stop-opacity="0.1"></stop>
                        </linearGradient>
                    </defs>
                    <polygon points="506.51 778.22 0 778.22 0 189.97 76.53 105.1 506.51 105.1 506.51 778.22" fill="url(#29b91a8c-5031-4728-9934-4de601869dbd)"></polygon>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-grey-900 mb-2">
                Work in progress!
            </h3>
            <p class="text-grey-600">
                Articles will be added here shortly, please check back soon.
            </p>
        </div>

    @endif
@stop