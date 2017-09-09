<?php

namespace App\Http\Controllers\Admin;

use App\ArtistPillar;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreArtistPillarRequest;
use Illuminate\Http\Request;

class ArtistPillarController extends Controller
{
    /**
     * Display a listing of all pillars.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // build a query for present pillars.
        $builder = ArtistPillar::query();

        $query = $request->input('q', '');
        if (!empty($query)) {

            $builder = $builder->search($query);

        }

        return view('admin.artists.pillars.index', [
            'route_title' => trans('admin_artists_pillars.title'),
            'route_description' => trans('admin_artists_categories.description'),
            'pillars' => $builder->paginate(),
            'query' => $query,
        ]);
    }

    /**
     * Show the form for creating pillars.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.artists.pillars.create', [
            'route_title' => trans('admin_artists_pillars.actions.create.title'),
            'route_description' => trans('admin_artists_pillars.actions.create.description'),
        ]);
    }

    /**
     * Store a newly created pillar in storage.
     *
     * @param StoreArtistPillarRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArtistPillarRequest $request)
    {
        Pillar::create($request->all())->addMedia($request->media)
                                       ->toMediaCollection(ArtistPillar::COLLECTION_NAME);

        flash(trans('admin_artists_pillars.actions.create.flash'))->success();

        return redirect()->route('admin.artists.pillars.index');
    }

    /**
     * Show the form for editing the specified pillar.
     *
     * @param Pillar $pillar
     *
     * @return \Illuminate\View\View
     */
    public function edit(ArtistPillar $pillar)
    {
        return view('admin.artists.pillars.edit', [
            'route_title' => trans('admin_artists_pillars.actions.update.title'),
            'route_description' => trans('admin_artists_pillars.actions.description'),
            'instance' => $pillar,
        ]);
    }

    /**
     * Update the specified pillar in storage.
     *
     * @param StoreArtistPillarRequest $request
     * @param Pillar                   $pillar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreArtistPillarRequest $request, ArtistPillar $pillar)
    {
        $pillar->update($request->all());

        flash(trans('admin_artists_pillars.actions.update.flash_message.success'))->success();

        return redirect()->route('admin.artists.pillars.index');
    }

    /**
     * Destroy the specified pillar in storage.
     *
     * @param Pillar $pillar
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ArtistPillar $pillar)
    {
        $pillar->delete();

        flash(trans('admin_artists_pillars.actions.delete.flash_message.success'))->success();

        return redirect()->route('admin.artists.pillars.index');
    }
}
