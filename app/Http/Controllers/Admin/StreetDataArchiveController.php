<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\StreetData;
use Illuminate\Http\Request;

class StreetDataArchiveController extends Controller
{
    public function index()
    {
        return view('admin.street_data.index', [
            'route_title' => trans('admin_street_data_archives.title'),
            'route_description' => trans('admin_street_data_archives.description'),
            'street_data' => StreetData::query()->archived()->paginate(),
        ]);
    }
}
