<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class ArtistController extends Controller
{
    public function index()
    {
        return view('admin.artists.index', [
            'route_title' => trans('admin_artists.title'),
            'route_description' => trans('admin_artists.description'),
            'artists' => User::orderBy('created_at', 'desc')->where('role', 0)->paginate(),
        ]);
    }
}
