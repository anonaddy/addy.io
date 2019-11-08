<ul class="list-reset my-0 lg:flex">
    <li class="pl-4">
        <a
            title="Help"
            href="/help/"
            class="block mb-4 lg:mb-0 lg:ml-6 text-white hover:text-grey-50 {{ $page->isActive('/help') ? 'active font-bold' : '' }}"
        >Help</a>
    </li>
    <li class="pl-4">
        <a
            title="FAQ"
            href="/faq/"
            class="block mb-4 lg:mb-0 lg:ml-6 text-white hover:text-grey-50 {{ $page->isActive('/faq') ? 'active font-bold' : '' }}"
        >FAQ</a>
    </li>
    <li class="pl-4">
        <a
            title="Blog"
            href="/blog/"
            class="block mb-4 lg:mb-0 lg:ml-6 text-white hover:text-grey-50 {{ $page->isActive('/blog') ? 'active font-bold' : '' }}"
        >Blog</a>
    </li>
    <li class="pl-4">
        <a
            title="Sign In"
            href="https://app.anonaddy.com/login"
            class="block mb-4 lg:mb-0 lg:ml-6 text-white hover:text-grey-50"
        >Sign In</a>
    </li>
    <li class="pl-4 mb-4 lg:mb-0">
        <a
            title="Register"
            href="https://app.anonaddy.com/register"
            class="-ml-3 lg:ml-0 bg-white cursor-pointer text-indigo-500 font-bold rounded-full lg:mt-0 py-2 lg:py-4 px-4 lg:px-8 shadow"
        >Register</a>
    </li>
</ul>