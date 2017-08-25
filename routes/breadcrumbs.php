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
