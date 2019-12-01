<!-- Navigation -->
<header class="nav">
    <div class="nav__holder nav--sticky">
        <div class="container relative">
            <div class="flex-parent">
                <!-- Side Menu Button -->
                <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                          <span class="nav-icon-toggle__box">
                            <span class="nav-icon-toggle__inner"></span>
                          </span>
                </button>

                <!-- Logo -->
                <a href="{{url('/')}}" class="logo">
                    <img class="logo__img" src="{{ asset('deus') }}/img/logo_fashion_1.png" srcset="{{ asset('deus') }}/img/logo_fashion_1.png 1x, {{ asset('deus') }}/img/logo_default@2x.png 2x" alt="logo">
                </a>

                <!-- Nav-wrap -->
                <nav class="flex-child nav__wrap d-none d-lg-block">
                    <ul class="nav__menu">

                        <li><a href="{{route('writter.front.home')}}" >Home</a></li>
                        <li><a href="{{route('writter.front.digital')}}" >Digital Marketing</a></li>
                        <li><a href="{{route('writter.front.finance')}}" >Finance</a></li>
                        <li><a href="{{route('writter.front.tech')}}" >Tech</a></li>
                        <li><a href="{{route('writter.front.seo')}}" >SEO Solutions</a></li>
                        <li><a href="{{route('writter.front.press')}}" >Press</a></li>
                        <li><a href="{{route('writter.front.gblogs')}}" >Guest Blogs</a></li>
                        @if(session('cart'))
                            <li><a href="{{ url('order/list') }}" class="sidenav__menu-url">Cart ({{ count((array) session('cart')) }})</a></li>
                        @endif


                    </ul> <!-- end menu -->
                </nav> <!-- end nav-wrap -->

                <!-- Nav Right -->
                <div class="nav__right">

                    <!-- Search -->
                    <div class="nav__right-item nav__search">
                        <a href="{{url('/')}}" class="nav__search-trigger" id="nav__search-trigger">
                            <i class="ui-search nav__search-trigger-icon"></i>
                        </a>
                        <div class="nav__search-box" id="nav__search-box">
                            <form class="nav__search-form">
                                <input type="text" placeholder="Search an article" class="nav__search-input">
                                <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                                    <i class="ui-search nav__search-icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div> <!-- end nav right -->

            </div> <!-- end flex-parent -->
        </div> <!-- end container -->

    </div>
</header>
<!-- end navigation -->
