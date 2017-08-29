<?php

namespace App\Http\Controllers\Admin;

use App\Pillar;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class ArtistCategoryController extends Controller
{
    public function index()
    {
        return view('admin.artists.categories.index', [
            'route_title' => trans('admin_artists_categories.title'),
            'route_description' => trans('admin_artists_categories.description'),
            'categories' => Pillar::orderBy('name', 'asc')->paginate(),
        ]);
    }
}
