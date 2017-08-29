<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events.index', [
            'route_title' => trans('admin_events.title'),
            'route_description' => trans('admin_events.description'),
            'events' => Event::orderBy('created_at', 'asc')->paginate(),
        ]);
    }
}
