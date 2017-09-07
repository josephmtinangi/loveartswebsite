<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\StreetData;
use Illuminate\Http\Request;

class StreetDataArchiveController extends Controller
{
    /**
     * Display a listing of all archived street data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // build a query for archived street data.
        $builder = StreetData::query()->archived();

        $query = $request->input('q', '');
        if (!empty($query)) {

            $builder = $builder->search($query);

        }

        return view('admin.street_data.index', [
            'route_title' => trans('admin_street_data_archives.title'),
            'route_description' => trans('admin_street_data_archives.description'),
            'street_data' => $builder->paginate(),
            'query' => $query,
        ]);
    }
}
