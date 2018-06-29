<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\RoadPointTranslation;
use App\Tags;
use Redirect;
use Schema;
use App\RoadPoint;
use App\Http\Requests\CreateRoadPointRequest;
use App\Http\Requests\UpdateRoadPointRequest;
use Illuminate\Http\Request;



class RoadPointController extends Controller {

	/**
	 * Display a listing of roadpoint
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $roadpoint = RoadPoint::all();

		return view('admin.roadpoint.index', compact('roadpoint'));
	}

	/**
	 * Show the form for creating a new roadpoint
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
        $languages = Language::all();
	    $tags = prepareForSelect(Tags::all());
	    
	    return view('admin.roadpoint.create', compact('tags', 'languages'));
	}

    /**
     * Store a newly created roadpoint in storage.
     *
     * @param CreateRoadPointRequest|Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(CreateRoadPointRequest $request)
	{

        $data = $request->all();
        unset($data['translations']);
		$roadpoint = RoadPoint::create($data);

        $this->createRoadPointTranslations($request, $roadpoint);

		return redirect()->route(config('quickadmin.route').'.roadpoint.index');
	}

	/**
	 * Show the form for editing the specified roadpoint.
	 *
	 * @param  int  $id
     *
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
        $languages = Language::all();
		$roadpoint = RoadPoint::find($id);
        $tags = prepareForSelect(Tags::all());

		return view('admin.roadpoint.edit', compact('roadpoint', 'tags', 'languages'));
	}

	/**
	 * Update the specified roadpoint in storage.
     * @param UpdateRoadPointRequest|Request $request
     *
	 * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function update($id, UpdateRoadPointRequest $request)
	{

        $data = $request->all();
        unset($data['translations']);
		$roadpoint = RoadPoint::findOrFail($id);

		$roadpoint->update($data);

        $roadpoint->translations()->delete();

        $this->createRoadPointTranslations($request, $roadpoint);

		return redirect()->route(config('quickadmin.route').'.roadpoint.index');
	}

	/**
	 * Remove the specified roadpoint from storage.
	 *
	 * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{

		RoadPoint::destroy($id);
		RoadPointTranslation::where('roadpoint_id', $id)->delete();

		return redirect()->route(config('quickadmin.route').'.roadpoint.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        $ids = [];
        if ($request->get('toDelete') != 'mass') {

            $ids = json_decode($request->get('toDelete'));
        } else {

            $ids = RoadPoint::all()->pluck('id');
        }

        foreach ($ids as $id) {

            $this->destroy($id);
        }

        return redirect()->route(config('quickadmin.route').'.roadpoint.index');
    }

    protected function createRoadPointTranslations(Request $request, $roadpoint)
    {
        foreach ($request->translations as $key => $value) {

            $translation = $value;
            $translation['locale'] = $key;

            $translationObj = new RoadPointTranslation($translation);
            $roadpoint->translations()->save($translationObj);
        }
    }

}
