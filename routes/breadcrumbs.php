<?php

// Home
Breadcrumbs::register('admin.home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('dashboard.name'), route('admin.home'));
});
