<?php

// Home
Breadcrumbs::register('admin.home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('dashboard.title'), route('admin.home'));
});
