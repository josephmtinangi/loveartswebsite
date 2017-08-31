<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of all upcoming events.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // build a query for up-and-coming events
        $builder = Event::query()->upComing();

        $query = $request->input('q', '');
        if (!empty($query)) {

            $builder = $builder->search($query);

        }

        return view('admin.events.index', [
            'route_title' => trans('admin_events.title'),
            'route_description' => trans('admin_events.description'),
            'events' => $builder->paginate(),
            'query' => $query,
        ]);
    }

    /**
     * Show the form for creating events.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.events.create', [
            'route_title' => trans('admin_events.actions.create.title'),
            'route_description' => trans('admin_events.actions.create.description'),
        ]);
    }

    /**
     * Store a newly created event in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEventRequest $request)
    {
        Event::create($request->all())->addMedia($request->file('poster_url'))
                                      ->toMediaCollection(Event::MEDIA_COLLECTION);

        flash(trans('admin_events.actions.create.flash_message.success'))->success();

        return redirect()->route('admin.events.index');
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param Event $event
     *
     * @return \Illuminate\View\View
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'route_title' => trans('admin_events.actions.update.title'),
            'route_description' => trans('admin_events.actions.update.description'),
            'instance' => $event,
        ]);
    }

    /**
     * Update the specified event in storage.
     *
     * @param StoreEventRequest $request
     * @param Event             $event
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreEventRequest $request, Event $event)
    {
        $event->update($request->all());

        flash(trans('admin_events.actions.update.flash_message.success'))->success();

        return redirect()->route('admin.events.index');
    }

    /**
     * Delete the specified event in storage.
     *
     * @param Event $event
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event)
    {
        $event->delete();

        flash(trans('admin_events.actions.delete.flash_message.success'))->success();

        return redirect()->route('admin.events.index');
    }
}
