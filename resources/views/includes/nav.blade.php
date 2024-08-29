<nav>
    <div class="container flex-between">
        <a href="{{ route('home.index') }}" style="display: flex; align-items: center; gap: 16px;">
            <img src="/assets/logo4.svg" alt="">
        </a>
        <div>
            <svg class="icon-burger" stroke="currentColor" fill="currentColor" stroke-width="0.4" viewBox="0 0 24 24" font-size="30" font-weight="900" class="menu-icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" ><g id="Menu_Fries"><path d="M20.437,19.937c0.276,0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-16.874,0.002c-0.276,-0 -0.5,-0.224 -0.5,-0.5c-0,-0.276 0.224,-0.5 0.5,-0.5l16.874,-0.002Z"></path><path d="M20.437,11.5c0.276,-0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-10,0.001c-0.276,-0 -0.5,-0.224 -0.5,-0.5c-0,-0.276 0.224,-0.5 0.5,-0.5l10,-0.001Z"></path><path d="M20.437,3.062c0.276,-0 0.5,0.224 0.5,0.5c0,0.276 -0.224,0.5 -0.5,0.5l-16.874,0.001c-0.276,-0 -0.5,-0.224 -0.5,-0.5c-0,-0.276 0.224,-0.5 0.5,-0.5l16.874,-0.001Z"></path></g></svg>
        </div>
        <div class="nav-links">
            <ul class="flex-between">
                <li><a class="active-link-nav" href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('cities.index') }}">Venus</a></li>
                <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                <li><a href="">About us</a></li>
                <li><a href="{{ route('contact.create') }}">Contact</a></li>
            </ul>
        </div>
        <div class="search-container">
            <div>
                <input type="text">
                <img src="/assets/icons/search.svg" alt="search-icon" id="search-icon">
            </div>
            <div class="search flex-between">
                <span class="line-search"></span>
                <h3 style="flex-shrink: 0;">الدورات بالعربية</h3>
            </div>
        </div>
    </div>
</nav>
<div class="mobile-overlay"></div>


<div class="nav-links-phone">
    <div class="flex-between mebile-menu-header">
        <a href="{{ route('home.index') }}" style="display: flex; align-items: center; gap: 16px;">
            <img src="/assets/logo4.svg" alt="" width="60">
        </a>
        <div class="close-nav">
            <img src="/assets/icons/x-close.svg" alt="" width="30px">
        </div>
    </div>
            <ul class="flex-colmun">
                <li><a class="active-link-nav" href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('cities.index') }}">Venus</a></li>
                <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                <li><a href="">About us</a></li>
                <li><a href="{{ route('contact.create') }}">Contact</a></li>
            </ul>
            <div class="search-phone">
                <div>
                    <input type="text">
                    <img src="/assets/icons/search.svg" alt="search-icon" id="search-icon">
                </div>
                <div class="search flex-between">
                    <h3 style="flex-shrink: 0;">الدورات بالعربية</h3>
                </div>
            </div>
</div>
