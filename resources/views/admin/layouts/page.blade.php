@extends('admin.layouts.main')

@section('content')

    {{--@start .page-heading--}}
    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-md-12">

            <h2 title="{{ $route_description }}">{{ $route_title }}</h2>

            @if (is_null($instance))

                {!! Breadcrumbs::render($route_name) !!}

            @else

                {!! Breadcrumbs::render($route_name, $instance) !!}

            @endif

        </div>

    </div>
    {{--@start .page-heading--}}

    {{--@start .wrapper-content--}}
    <div class="row wrapper wrapper-content">

        <div class="row">

            <div class="col-md-12">

                @include('flash::message')

            </div>

        </div>

        @yield('page')

    </div>
    {{--@end .wrapper-content--}}

@endsection
