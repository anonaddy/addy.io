<input id="menu-handle" type="checkbox">
<label for="menu-handle" class="absolute top-0 right-0 mr-4 mt-3 flex justify-center items-center bg-indigo-500 border border-blue-500 h-10 px-5 rounded-full lg:hidden focus:outline-none cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg"
        class="nav-menu-show fill-current text-white h-9 w-4" viewBox="0 0 32 32"
    >
        <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg"
        class="nav-menu-hide fill-current text-white h-9 w-4" viewBox="0 0 36 30"
    >
        <polygon points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "/>
    </svg>
</label>

<nav class="mobile-nav-menu lg:hidden">
    @include('_nav.menu-items')
</nav>
