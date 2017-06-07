<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- CSRF Token -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Tanzania music,drama ,poetry,Tanzania ndio mimi,Love Arts Tanzania | Passion - Impact - Change">
    <meta name="description" content="A platform that unites individuals who share passion for arts to bring impact and positive changes.">
    <meta name="author" content="iPF Softwares ">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('fav.png')}}" rel="shortcut icon" type="image">
    <title>Love Arts Tanzania | Passion - Impact - Change</title>

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flex.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('js/lib/jquery-3.1.0.min.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    @yield('content')

    @if(isset($long_footer))
        @include('layouts.long-footer')
    @else
        @include('layouts.footer')
    @endif
    <!-- Scripts -->

    <script src="{{asset('js/lib/angular-1.6.4.min.js')}}"></script>
    <script src="{{asset('js/lib/TweenMax.min.js')}}"></script>
    <script src="{{asset('js/lib/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('js/lib/sm-animation.gsap.min.js')}}"></script>
    <script src="{{asset('js/lib/sm-debug.addIndicators.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

    @yield('scripts')
</body>
</html>
