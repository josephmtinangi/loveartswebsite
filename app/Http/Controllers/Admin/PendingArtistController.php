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
     * @param   Request                 $request
     *
     * @return  \Illuminate\View\View
     */
    public function getPendingArtists(Request $request)
    {
        // build a query for pending artists
        $builder = User::query()->pending();

        $query = $request->input('q', '');
        if (!empty($query)) {
            $builder = $builder->search($query);
        }

        return view('admin.artists.pending', [
            'route_title'       => trans('admin_artists.pending.title'),
            'route_description' => trans('admin_artists.description'),
            'artists'           => $builder->paginate(),
            'query'             => $query,
        ]);
    }
}
