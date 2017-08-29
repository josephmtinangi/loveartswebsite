{{--@start .nav-header--}}
<li class="nav-header">

    {{--@start .profile-element--}}
    <div class="dropdown profile-element">

        <img class="img-circle" src="{{ asset('./images/avatar.jpg') }}" />

        <a class="dropdown-toggle" href="#" data-toggle="dropdown">

            <span class="clear">

                <span class="block m-t-xs">

                    <strong class="font-bold">

                        {{ if_available(Auth::guard('admin')->user()->name) }}

                    </strong>

                </span>

                <span class="text-muted text-xs block">

                    {{ if_available(Auth::guard('admin')->user()->role) }} <b class="caret"></b>

                </span>

            </span>

        </a>

        {{--@start .dropdown-menu--}}
        <ul class="dropdown-menu m-t-xs">
            <li>
                <a href="#">{{ trans('admin_navigation.header.profile') }}</a>
            </li>

            <li>
                <a href="#">{{ trans('admin_navigation.header.settings') }}</a>
            </li>

            <li class="divider"></li>

            <li>

                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    {{ trans('admin_navigation.header.signout') }}

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">

                        {!! Form::token() !!}

                    </form>

                </a>

            </li>

        </ul>
        {{--@end .dropdown-menu--}}

    </div>
    {{--@end .profile-element--}}
</li>
{{--@end .nav-header--}}
