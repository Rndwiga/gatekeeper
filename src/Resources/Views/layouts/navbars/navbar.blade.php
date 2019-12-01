@auth()
    {{--@include('layouts.navbars.navs.auth')--}}
    @include(config('gatekeeper.views.layouts.partials.navbars.navs.auth'))
@endauth

@guest()
    {{--@include('layouts.navbars.navs.guest')--}}
    @include(config('gatekeeper.views.layouts.partials.navbars.navs.guest'))
@endguest
