<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Auth::loginUsingId(17, true);
        return view('home');
    }

    public function about()
    {
        return view('about.index-ol');
    }

    public function contact()
    {
//    \    return view('home');
    }

    public function show($show)
    {
        return view('media.show', compact('show'));
    }

    public function show_item($show, $item)
    {
        return view('media.show_item', compact('show', 'item'));
    }
}
