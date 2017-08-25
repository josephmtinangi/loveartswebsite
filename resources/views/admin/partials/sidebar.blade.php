{{--@start .navbar-static-side--}}
<nav class="navbar-default navbar-static-side" role="navigation">

    {{--@start .sidebar-collapse--}}
    <div class="sidebar-collapse">

        {{--@start .metismenu --}}
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">

                {{--@start .profile-element--}}
                <div class="dropdown profile-element">

                    <img class="img-circle" src="{{ asset('./images/avatar.jpg') }}" />

                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">

                        <span class="clear">

                            <span class="block m-t-xs">

                                <strong class="font-bold">

                                    John Doe

                                </strong>

                            </span>

                            <span class="text-muted text-xs block">

                                French Aristocrat <b class="caret"></b>

                            </span>

                        </span>

                    </a>

                    {{--@start .dropdown-menu--}}
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">

                        <li><a href="#">Profile</a></li>

                        <li><a href="#">Notice</a></li>

                        <li class="divider"></li>

                        @unless(Auth::guest())
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">

                                    Sign out

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">

                                        {{ csrf_field() }}

                                    </form>

                                </a>
                            </li>
                        @endunless
                    </ul>
                    {{--@end .dropdown-menu--}}

                    <li>
                        <a href="#">
                            <span class="nav-label">Reports</span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="nav-label">Configuration</span>
                            <span class="fa arrow"></span>
                        </a>
                    </li>

                </ul>
                {{--@end metismenu--}}

            </div>
            {{--@end .sidebar-collapse--}}

        </nav>
        {{--@end .navbar-static-side--}}
