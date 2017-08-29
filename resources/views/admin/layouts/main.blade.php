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
<body>

    {{--@start .wrapper--}}
    <div id="wrapper">

        @include('admin.partials.sidebar')

        {{--@start #page-wrapper--}}
        <div id="page-wrapper" class="gray-bg">

            @yield('content')

        </div>
        {{--@end #page-wrapper--}}

        {{--@start .container-fluid--}}
        <div class="container-fluid m-t-lg">

            <div class="row">

                <div class="col-md-12">

                    <div class="footer">

                        {{--TODO Add owner information--}}

                        <div>

                            <strong class="m-r-xs">Copyright</strong>&copy; {{date('Y')}}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    {{--@end .container-fluid--}}

    <script src="{{ asset('js/admin.js') }}"></script>

    @stack('scripts')
</body>
</html>
