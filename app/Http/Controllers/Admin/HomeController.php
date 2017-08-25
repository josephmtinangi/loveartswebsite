<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Show the administrator dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        return view('admin.home');
    }
}
