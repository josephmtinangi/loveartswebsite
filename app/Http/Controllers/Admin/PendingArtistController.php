<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class PendingArtistController extends Controller
{
    /**
     * Display a listing of all artists waiting verification.
     *
     * @return \Illuminate\View\View
     */
    public function getPendingArtists()
    {
        return view('admin.artists.index', [
            'route_title'       => trans('admin_artists.pending.title'),
            'route_description' => trans('admin_artists.description'),
            'artists'           => User::query()->pending()->paginate(),
        ]);
    }
}
