<li>
    <a href="{{ route('admin.home') }}">
        <span class="nav-label">
            {{ trans('navigation.content.home.label') }}
        </span>
    </a>
<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('navigation.content.artists.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>

    <ul class="nav nav-second-level">
        <li>
            <a href="#">
                {{ trans('navigation.content.artists.list') }}
            </a>
        </li>

        <li>
            <a href="#">
                {{ trans('navigation.content.artists.categories') }}
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('navigation.content.events.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#">
                {{ trans('navigation.content.events.list') }}
            </a>
        </li>

        <li>
            <a href="#">
                {{ trans('navigation.content.events.archives') }}
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('navigation.content.street_data.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#">
                {{ trans('navigation.content.street_data.list') }}
            </a>
        </li>

        <li>
            <a href="#">
                {{ trans('navigation.content.street_data.archives') }}
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="#">
        <span class="nav-label">
            {{ trans('navigation.content.system_users.label') }}
        </span>

        <span class="fa arrow"></span>
    </a>

    <ul class="nav nav-second-level">
        <li>
            <a href="#">
                {{ trans('navigation.content.system_users.list') }}
            </a>
        </li>

        <li>
            <a href="#">
                {{ trans('navigation.content.system_users.roles') }}
            </a>
        </li>
    </ul>
</li>
