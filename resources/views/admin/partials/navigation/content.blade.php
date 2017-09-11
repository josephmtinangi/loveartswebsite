<li>
    <a class="{{ isActiveRoute('admin.home') }}" href="{{ route('admin.home') }}">
        <span class="nav-label">
            {{ trans('admin_navigation.content.home.label') }}
        </span>
    </a>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('admin_navigation.content.artists.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>

    <ul class="nav nav-second-level">
        <li>
            <a href="{{ route('admin.artists.index') }}">
                {{ trans('admin_navigation.content.artists.list') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.artists.pillars.index') }}">
                {{ trans('admin_navigation.content.artists.pillars') }}
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('admin_navigation.content.events.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ route('admin.events.index') }}">
                {{ trans('admin_navigation.content.events.list') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.events.archives.index') }}">
                {{ trans('admin_navigation.content.events.archives') }}
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('admin_navigation.content.street_data.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li>
            <a href="{{ route('admin.street_data.index') }}">
                {{ trans('admin_navigation.content.street_data.list') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.street_data.archives.index') }}">
                {{ trans('admin_navigation.content.street_data.archives') }}
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('admin_navigation.content.system.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>

    <ul class="nav nav-second-level">
        <li>
            <a href="{{ route('admin.users.index') }}">
                {{ trans('admin_navigation.content.system.users') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.roles.index') }}">
                {{ trans('admin_navigation.content.system.roles') }}
            </a>
        </li>
    </ul>
</li>
