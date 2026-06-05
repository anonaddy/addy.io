---
pagination:
    collection: changelogs
    perPage: 20
title: Changelog
description: Product and documentation updates for addy.io.
---

@extends('_layouts.master')

@section('body')
    <div class="mb-10 text-center max-w-3xl mx-auto">
        <h1 class="mb-3">Changelog</h1>
        <p class="text-grey-600 text-lg mb-0">See what is new in addy.io. Updates are grouped by date and include product, documentation, and reliability improvements. They are typically published weekly.</p>
    </div>

    <div class="max-w-4xl mx-auto">
    @foreach ($pagination->items as $entry)
        <article class="border-b border-grey-200 py-5 md:py-6">
            <div class="grid gap-3 md:gap-5 md:grid-cols-[110px_minmax(0,1fr)_190px] md:items-start">
                <p class="text-xs font-semibold text-grey-500 tracking-wide pt-1 mb-0">{{ $entry->getDate()->format('M j, Y') }}</p>

                <h2 class="text-base md:text-lg font-semibold mb-0 leading-snug">
                    <a href="{{ $entry->getUrl() }}" class="text-grey-900 hover:text-indigo-700">
                        {{ $entry->summary }}
                    </a>
                </h2>

                <div class="flex flex-col md:items-end items-start gap-1.5 text-xs">
                    <span class="inline-flex items-center rounded-full bg-indigo-100 text-indigo-800 ring-1 ring-inset ring-indigo-200 px-2 py-0.5 font-medium whitespace-nowrap">{{ $entry->new }} new</span>
                    <span class="inline-flex items-center rounded-full bg-cyan-100 text-cyan-900 ring-1 ring-inset ring-cyan-300 px-2 py-0.5 font-medium whitespace-nowrap">{{ $entry->improved }} {{ $entry->improved == 1 ? 'improvement' : 'improvements' }}</span>
                    <span class="inline-flex items-center rounded-full bg-green-100 text-green-800 ring-1 ring-inset ring-green-200 px-2 py-0.5 font-medium whitespace-nowrap">{{ $entry->fixed }} {{ $entry->fixed == 1 ? 'fix' : 'fixes' }}</span>
                </div>
            </div>
        </article>
    @endforeach
    </div>

    @if($pagination->pages->count() > 1)
        <nav class="flex flex-wrap items-center gap-2 text-sm my-10">
        @if($previous = $pagination->previous)
            <a href="{{ $previous }}/" title="Previous page" class="inline-flex items-center rounded-lg border border-grey-300 px-3 py-2 text-grey-700 hover:border-indigo-300 hover:text-indigo-700">&lt; Prev</a>
        @endif

        @foreach($pagination->pages as $pageNumber => $path)
            <a
                href="{{ $path }}/"
                title="Go to page {{ $pageNumber }}"
                class="inline-flex items-center rounded-lg border px-3 py-2 {{ $pagination->currentPage == $pageNumber ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-grey-300 text-grey-700 hover:border-indigo-300 hover:text-indigo-700' }}"
            >
                {{ $pageNumber }}
            </a>
        @endforeach

        @if($next = $pagination->next)
            <a href="{{ $next }}/" title="Next page" class="inline-flex items-center rounded-lg border border-grey-300 px-3 py-2 text-grey-700 hover:border-indigo-300 hover:text-indigo-700">Next ></a>
        @endif
        </nav>
    @endif
@stop
