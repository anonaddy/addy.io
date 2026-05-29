---
pagination:
    collection: helpCategories
title: "Help Centre"
description: The list of all help articles for addy.io. You'll find information about using aliases, adding recipients and much more.
---

@extends('_layouts.help_centre')

@section('helpContent')
    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        @php
            $sortedCategories = $helpCategories->sortBy(function($category) {
                return [
                    $category->order ?? 999,
                    $category->title ?? ''
                ];
            })->values();
        @endphp
        @foreach ($sortedCategories as $category)
            @php
                $articleCount = count($category->articles($articles));
            @endphp
            <a
                href="{{ $category->getUrl() }}/"
                class="group block bg-white border border-grey-200 rounded-xl p-6 hover:border-indigo-300 hover:shadow-lg transition-all duration-200"
            >
                <div class="flex items-start justify-between mb-3">
                    <h3 class="text-xl font-semibold text-grey-900 group-hover:text-indigo-600 transition-colors">
                        {{ $category->title }}
                    </h3>
                    <svg class="w-5 h-5 text-grey-400 group-hover:text-indigo-600 transition-colors flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
                @if($category->description)
                    <p class="text-grey-600 text-sm mb-4 line-clamp-2">
                        {{ $category->description }}
                    </p>
                @endif
                <div class="flex items-center text-sm text-grey-500">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>{{ $articleCount }} {{ $articleCount === 1 ? 'article' : 'articles' }}</span>
                </div>
            </a>
        @endforeach
    </div>
@stop