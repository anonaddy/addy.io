@extends('_layouts.master')

@section('body')
    <script>plausible("404",{ props: { path: document.location.pathname } });</script>
    <div class="flex flex-col items-center text-grey-700 mt-32">
        <h1 class="text-6xl font-light leading-none mb-2">404</h1>

        <h2 class="text-3xl">Page not found.</h2>

        <hr class="block w-full max-w-sm mx-auto border my-8">

        <p class="text-xl">
            Head back to the <a title="Home" href="/">home page</a>.
        </p>
    </div>
@endsection
