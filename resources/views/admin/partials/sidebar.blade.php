{{--@start .navbar-static-side--}}
<nav class="navbar-default navbar-static-side" role="navigation">

    {{--@start .sidebar-collapse--}}
    <div class="sidebar-collapse">

        {{--@start .metismenu --}}
        <ul class="nav metismenu" id="side-menu">

            @include('admin.partials.navigation.header')

            @include('admin.partials.navigation.content')

        </ul>
        {{--@end .metismenu--}}

    </div>
    {{--@end .sidebar-collapse--}}

</nav>
{{--@end .navbar-static-side--}}
