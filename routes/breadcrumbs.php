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

// Home > Street Data
Breadcrumbs::register('admin.street_data.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('admin_street_data.name'), route('admin.street_data.index'));
});

// Home > System > Users
Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push('System Users', route('admin.users.index'));
});

// Home > System > Roles
Breadcrumbs::register('admin.roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push('System Role', route('admin.roles.index'));
});
