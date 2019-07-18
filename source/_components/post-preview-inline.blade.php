<div class="flex flex-col mb-4">
    <div class="text-grey-700 font-medium my-2 flex items-center">
        {{ $post->getDate()->format('F j, Y') }}
        <span class="mx-2">•</span>
        @foreach ($post->categories as $i => $category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-indigo-700 hover:bg-indigo-800 leading-loose tracking-wide text-white uppercase text-2xs font-semibold rounded mr-4 px-2 pt-px"
            >{{ $category }}</a>
        @endforeach

</div>

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="text-grey-900 font-extrabold"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>

    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="font-semibold tracking-wide mb-2"
    >Read more</a>
</div>
