<?php

namespace App\Http\Controllers\Admin;

use App\User as Artist;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

// TODO only allow routes [create, store]
class FeaturedArtistController extends Controller
{
    public function create(Artist $artist)
    {
        return view('admin.artists.featured.create', [
            'route_title' => 'New Featured Artist',
            'route_description' => 'Feature an artist',
            'instance' => $artist,
        ]);
    }

    public function store(Request $request, Artist $artist)
    {
        //$request->validate();

        //$artist->feature($request->only['biography', 'questions', ]);

        //flash('Hurray! You have successfully featured an artist'))->success();

        return redirect()->route('admin.artists.index');
    }
}
