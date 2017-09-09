<?php

namespace App\Http\Controllers\Admin;

use App\ArtistPillar;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class ArtistPillarController extends Controller
{
    public function index()
    {
        return view('admin.artists.pillars.index', [
            'route_title' => trans('admin_artists_pillars.title'),
            'route_description' => trans('admin_artists_categories.description'),
            'categories' => ArtistPillar::orderBy('name', 'asc')->paginate(),
        ]);
    }
}
