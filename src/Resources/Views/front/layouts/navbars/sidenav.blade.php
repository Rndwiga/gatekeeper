<!-- Sidenav -->
<header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
        <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
            <i class="ui-close sidenav__close-icon"></i>
        </button>
    </div>

    <!-- Nav -->
    <nav class="sidenav__menu-container">
        <ul class="sidenav__menu" role="menubar">
            <!-- Categories -->
            <li><a href="{{route('writter.front.home')}}" class="sidenav__menu-url">Home</a></li>
            <li><a href="{{route('writter.front.digital')}}" class="sidenav__menu-url">Digital Marketing</a></li>
            <li><a href="{{route('writter.front.finance')}}" class="sidenav__menu-url">Finance</a></li>
            <li><a href="{{route('writter.front.tech')}}" class="sidenav__menu-url">Tech</a></li>
            <li><a href="{{route('writter.front.seo')}}" class="sidenav__menu-url">SEO Solutions</a></li>
            <li><a href="{{route('writter.front.press')}}" class="sidenav__menu-url">Press</a></li>
            <li><a href="{{route('writter.front.gblogs')}}" class="sidenav__menu-url">Guest Blogs</a></li>
            @if(session('cart'))
                <li><a href="{{ url('order/list') }}" class="sidenav__menu-url">Cart ({{ count((array) session('cart')) }})</a></li>
            @endif
        </ul>
    </nav>

{{--    <div class="socials sidenav__socials">
        <a class="social social-facebook" href="index.html#" target="_blank" aria-label="facebook">
            <i class="ui-facebook"></i>
        </a>
        <a class="social social-twitter" href="index.html#" target="_blank" aria-label="twitter">
            <i class="ui-twitter"></i>
        </a>
        <a class="social social-google-plus" href="index.html#" target="_blank" aria-label="google">
            <i class="ui-google"></i>
        </a>
        <a class="social social-youtube" href="index.html#" target="_blank" aria-label="youtube">
            <i class="ui-youtube"></i>
        </a>
        <a class="social social-instagram" href="index.html#" target="_blank" aria-label="instagram">
            <i class="ui-instagram"></i>
        </a>
    </div>--}}
</header>
<!-- end sidenav -->
