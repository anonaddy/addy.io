@extends('_layouts.help_centre')

@section('helpContent')
    <!-- Breadcrumbs -->
    @if ($page->helpCategories && count($page->helpCategories) > 0)
        @php
            $categorySlug = $page->helpCategories[0];
            $category = null;
            foreach ($helpCategories as $cat) {
                if ($cat->getFilename() === $categorySlug) {
                    $category = $cat;
                    break;
                }
            }
            $categoryTitle = $category ? $category->title : ucfirst(str_replace('-', ' ', $categorySlug));
        @endphp
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-grey-600 flex-wrap">
                <li>
                    <a href="/help/" class="hover:text-indigo-600 transition-colors">All Categories</a>
                </li>
                <li>
                    <svg class="w-4 h-4 text-grey-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </li>
                <li>
                    <a href="{{ '/help/category/' . $categorySlug }}/" class="hover:text-indigo-600 transition-colors">{{ $categoryTitle }}</a>
                </li>
                <li class="hidden md:block">
                    <svg class="w-4 h-4 text-grey-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </li>
                <li class="text-grey-900 font-medium hidden md:block" aria-current="page">
                    {{ $page->title }}
                </li>
            </ol>
        </nav>
    @endif

    <!-- Article Header -->
    <div class="mb-8 pb-6 border-b border-grey-200">
        <h1 class="text-3xl md:text-4xl font-bold text-grey-900 mb-4 leading-tight">{{ $page->title }}</h1>

        @if ($page->helpCategories || $page->advanced)
            <div class="flex items-center flex-wrap gap-2 justify-between">
                <div class="flex items-center flex-wrap gap-2">
                    @if ($page->helpCategories)
                        @foreach ($page->helpCategories as $i => $category)
                            <a
                                href="{{ '/help/category/' . $category }}/"
                                title="View articles in {{ $category }}"
                                class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 hover:bg-indigo-200 text-xs font-medium transition-colors"
                            >
                                {{ ucfirst(str_replace('-', ' ', $category)) }}
                            </a>
                        @endforeach
                    @endif
                </div>
                @if($page->advanced)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                        Advanced
                    </span>
                @endif
            </div>
        @endif
    </div>

    <!-- Article Content -->
    <article class="max-w-none text-grey-700 leading-relaxed article-with-heading-links">
        <div v-pre class="space-y-6">
            @yield('content')
        </div>
    </article>

    <!-- Footer Section -->
    <div class="mt-12 pt-8 border-t border-grey-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            @if ($page->helpCategories && count($page->helpCategories) > 0)
                <a
                    href="{{ '/help/category/' . $page->helpCategories[0] }}/"
                    class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-medium"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to {{ ucfirst(str_replace('-', ' ', $page->helpCategories[0])) }}
                </a>
            @endif
            <div class="flex items-center text-sm text-grey-600">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Last Updated: {{ date('F j, Y', $page->date) }}</span>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="module" src="{{ $page->vite('source/_assets/js/article-heading-links.js') }}"></script>
@endpush