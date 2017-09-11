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
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function getVerifiedArtists(Request $request)
    {
        // build a query for verfied artists
        $builder = User::query()->verified();

        $query = $request->input('q', '');
        if (!empty($query)) {

            $builder = $builder->search($query);

        }

        return view('admin.artists.index', [
            'route_title'       => trans('admin_artists.verified.title'),
            'route_description' => trans('admin_artists.description'),
            'artists'           => $builder->paginate(),
            'query'             => $query,
        ]);
    }
}
