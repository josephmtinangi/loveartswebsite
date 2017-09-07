<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreStreetDataRequest;
use Illuminate\Http\Request;
use App\StreetData;

class StreetDataController extends Controller
{
    /**
     * Display a listing of street data.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // build a query for active street data.
        $builder = StreetData::query()->active();

        $query = $request->input('q', '');
        if (!empty($query)) {

            $builder = $builder->search($query);

        }

        return view('admin.street_data.index', [
            'route_title'       => trans('admin_street_data.title'),
            'route_description' => trans('admin_street_data.description'),
            'street_data'       => $builder->paginate(),
            'query'             => $query,
        ]);
    }

    /**
     * Show the form for creating street data.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.street_data.create', [
            'route_title'       => trans('admin_street_data.actions.create.title'),
            'route_description' => trans('admin_street_data.actions.create.description'),
        ]);
    }

    /**
     * Store a newly created street data in storage.
     *
     * @param StoreStreetDataRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStreetDataRequest $request)
    {
        StreetData::create($request->all())->addMedia($request->file('attachment'))
                                           ->toMediaCollection(StreetData::COLLECTION_NAME);

        flash(trans('admin_street_data.actions.create.flash_message.success'))->success();

        return redirect()->route('admin.street_data.index');
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param StreetData $streetData
     *
     * @return \Illuminate\View\View
     */
    public function edit(StreetData $streetData)
    {
        return view('admin.street_data.edit', [
            'route_title'       => trans('admin_street_data.actions.update.title'),
            'route_description' => trans('admin_street_data.actions.update.description'),
            'instance'          => $streetData,
        ]);
    }

    /**
     * Update the specified event in storage.
     *
     * @param StoreStreetDataRequest $request
     * @param StreetData             $streetData
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreStreetDataRequest $request, StreetData $streetData)
    {
        $streetData->update($request->all());

        flash(trans('admin_street_data.actions.update.flash_message.success'))->success();

        return redirect()->route('admin.street_data.index');
    }

    /**
     * Delete the specified event in storage.
     *
     * @param StreetData $streetData
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StreetData $streetData)
    {
        $streetData->delete();

        flash(trans('admin_street_data.actions.delete.flash_message.success'))->success();

        return redirect()->route('admin.street_data.index');
    }
}
