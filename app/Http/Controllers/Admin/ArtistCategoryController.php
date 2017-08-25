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
            'route_title' => 'All Artist Categories',
            'route_description' => 'List of all artist categories',
            'categories' => Pillar::all(),
        ]);
    }
}
