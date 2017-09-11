<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class VerifiedArtistController extends Controller
{
    /**
     * Display a listing of all verified artists.
     *
     * @return \Illuminate\View\View
     */
    public function getVerifiedArtists()
    {
        return view('admin.artists.index', [
            'route_title'       => trans('admin_artists.verified.title'),
            'route_description' => trans('admin_artists.description'),
            'artists'           => User::query()->verified()->paginate(),
        ]);
    }
}
