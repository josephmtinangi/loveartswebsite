<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class EventArchiveController extends Controller
{
    public function index()
    {
        return view('admin.events.index', [
            'route_title' => trans('admin_events_archives.title'),
            'route_description' => trans('admin_events_archives.description'),
            'events' => Event::orderBy('updated_at', Event::SORT_ORDER)->archived()->paginate(),
        ]);
    }
}
