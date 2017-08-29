<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--See http://www.iacquire.com/blog/18-meta-tags-every-webpage-should-have-in-2013--}}

    {{--TODO Site-wide Metadata--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    @yield('content')

    <script src="{{ asset('js/admin.js') }}"></script>

    @yield('scripts')

</body>

</html>
