<?php

// Home
Breadcrumbs::register('admin.home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('admin_home.name'), route('admin.home'));
});

// Home > Artists
Breadcrumbs::register('admin.artists.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('admin_artists.name'), route('admin.artists.index'));
});

// Home > Artist > Categories
Breadcrumbs::register('admin.artists.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.artists.index');

    $breadcrumbs->push(trans('admin_artists_categories.name'), route('admin.artists.categories.index'));
});

// Home > Events
Breadcrumbs::register('admin.events.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('admin_events.name'), route('admin.events.index'));
});

// Home > Events > New Event
Breadcrumbs::register('admin.events.create', function($breadcrumbs) {
    $breadcrumbs->parent('admin.events.index');

    $breadcrumbs->push(trans('admin_events.actions.create.name'), route('admin.events.create'));
});

// Home > Events > [Event Title]
Breadcrumbs::register('admin.events.edit', function($breadcrumbs, $instance) {
    $breadcrumbs->parent('admin.events.index');

    $breadcrumbs->push(trans('admin_events.actions.update.name'), route('admin.events.edit', $instance->id));
});

// Home > Events > Archives
Breadcrumbs::register('admin.events.archives.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.events.index');

    $breadcrumbs->push(trans('admin_events_archives.name'), route('admin.events.archives.index'));
});

// Home > Street Data
Breadcrumbs::register('admin.street_data.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('admin_street_data.name'), route('admin.street_data.index'));
});

// Home > Street Data > Archives
Breadcrumbs::register('admin.street_data.archives.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.street_data.index');

    $breadcrumbs->push(trans('admin_street_data_archives.name'), route('admin.street_data.archives.index'));
});

// Home > System > Users
Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('admin_users.name'), route('admin.users.index'));
});

// Home > System > Roles
Breadcrumbs::register('admin.roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('admin_roles.name'), route('admin.roles.index'));
});
