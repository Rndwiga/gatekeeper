<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/summernote/dist/summernote-bs4.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route(config('gatekeeper.routes.logout')) }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{--@include('layouts.navbars.sidebar') --}}
            @include(config('gatekeeper.views.layouts.partials.navbars.sidebar'))
        @endauth

        <div class="main-content">
            {{--@include('layouts.navbars.navbar')--}}
            @include(config('gatekeeper.views.layouts.partials.navbars.navbar'))
            @yield('content')
        </div>

        @guest()
           {{-- @include('layouts.footers.guest')--}}
            @include(config('gatekeeper.views.layouts.partials.footers.guest'))
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/summernote/dist/summernote-bs4.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
