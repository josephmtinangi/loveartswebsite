<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class EventArchiveController extends Controller
{
    /**
     * Display a listing of all passed events.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // build a query for passed events
        $builder = Event::query()->pastDue();

        $query = $request->input('q', '');
        if (!empty($query)) {

            $builder = $builder->search($query);

        }

        return view('admin.events.index', [
            'route_title' => trans('admin_events_archives.title'),
            'route_description' => trans('admin_events_archives.description'),
            'events' => $builder->paginate(),
            'query' => $query,
        ]);
    }
}
