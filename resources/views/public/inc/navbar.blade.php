<nav class="site-navigation position-relative text-right" role="navigation" style="z-index:999 !important">
    
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
        <li class="{{ setActive(['public.index'], 'active') }}">
            <a href="{{ route('public.index') }}" class="nav-link text-left">Home</a>
        </li>

        @foreach ($pages->where('show_main_menu', true) as $item)
            <li class="{{ setActiveUrl([$item->page_slug], 'active') }}">
                <a href="{{ route('default.page',  $item->page_slug) }}" class="nav-link text-left">
                    {{ $item->page_title }}
                </a>
            </li>      
        @endforeach


        <li class="{{ setActive(['public.courses'], 'active') }}">
            <a href="{{ route('public.courses') }}" class="nav-link text-left">Courses</a>
        </li>
        <li class="{{ setActive(['public.contact'], 'active') }}">
            <a href="{{ route('public.contact') }}" class="nav-link text-left">Contact</a>
        </li>
    </ul>
    </ul>
</nav>