<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the administrator dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function showHome()
    {
        return view('admin.home');
    }
}
