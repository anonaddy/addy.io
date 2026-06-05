@extends('_layouts.master')

@section('body')
    <a href="/changelog/" class="font-semibold inline-flex items-center">
        <svg class="w-5 h-5 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to all changelogs
    </a>

    <h1 class="mt-6 mb-4">Changelog for {{ $page->getDate()->format('F jS, Y') }}</h1>

    <p class="text-lg text-grey-700 mb-8">{{ $page->summary }}</p>

    <article class="max-w-none text-grey-700 leading-relaxed article-with-heading-links">
        <div v-pre class="space-y-6">
            @yield('content')
        </div>
    </article>

    @php
        $latestChangelogs = $changelogs
            ->filter(fn ($entry) => $entry->getPath() !== $page->getPath())
            ->take(3);
    @endphp

    @if ($latestChangelogs->isNotEmpty())
        <hr class="my-12 border-b">

        <section class="mb-8 max-w-4xl">
            <h2 class="mb-2">Latest changelogs</h2>
            <p class="text-grey-600 mb-6">Recent updates you might have missed.</p>

            <div class="rounded-xl border border-grey-200 divide-y divide-grey-200 overflow-hidden bg-white shadow-sm">
                @foreach ($latestChangelogs as $entry)
                    <article class="group px-5 py-4 md:px-6 md:py-5 hover:bg-grey-50 transition-colors">
                        <div class="md:flex md:items-start md:justify-between md:gap-6">
                            <div class="min-w-0">
                                <p class="text-xs font-semibold uppercase tracking-wide text-grey-500 mb-2">{{ $entry->getDate()->format('M j, Y') }}</p>
                                <a href="{{ $entry->getUrl() }}" class="block font-semibold text-grey-900 leading-snug group-hover:text-indigo-700">
                                    {{ $entry->summary }}
                                </a>
                            </div>
                            <a href="{{ $entry->getUrl() }}" class="mt-3 md:mt-0 inline-flex items-center text-sm font-semibold whitespace-nowrap">
                                Read more
                                <svg class="w-5 h-5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-6">
                <a href="/changelog/" class="inline-flex items-center rounded-lg border border-grey-300 px-4 py-2 font-semibold hover:border-indigo-300 hover:text-indigo-700 transition-colors">
                    All changelogs
                    <svg class="w-5 h-5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </section>
    @endif
@stop
