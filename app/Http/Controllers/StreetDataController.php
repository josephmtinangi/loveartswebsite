<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Info;
use Illuminate\Http\Request;

class StreetDataController extends Controller
{
    public function index()
    {
        return view('admin.street_data.index', [
            'route_title' => 'Street Data',
            'route_description' => 'Data za kitaa',
            'street_data' => Info::all(),
        ]);
    }
}
