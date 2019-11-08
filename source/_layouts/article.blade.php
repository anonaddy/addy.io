@extends('_layouts.help_centre')

@section('helpContent')
    <h2 class="leading-none mb-10">{{ $page->title }}</h2>

    <div v-pre>
        @yield('content')
    </div>

@endsection