<?php

// Home
Breadcrumbs::register('admin.home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('dashboard.name'), route('admin.home'));
});

// Home > Artists
Breadcrumbs::register('admin.artists.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push(trans('artists.name'), route('admin.artists.index'));
});

// Home > Artist Categories
Breadcrumbs::register('admin.artists.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push('Artist Categories', route('admin.artists.categories.index'));
});

// Home > Events
Breadcrumbs::register('admin.events.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push('Events', route('admin.events.index'));
});

// Home > Street Data
Breadcrumbs::register('admin.street_data.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push('Street Data', route('admin.street_data.index'));
});

// Home > System User
Breadcrumbs::register('admin.system_users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');

    $breadcrumbs->push('System Users', route('admin.system_users.index'));
});
