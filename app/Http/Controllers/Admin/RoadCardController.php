<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Paper;
use App\RoadCardTranslation;
use App\RoadPoint;
use Redirect;
use Schema;
use App\RoadCard;
use App\Http\Requests\CreateRoadCardRequest;
use App\Http\Requests\UpdateRoadCardRequest;
use Illuminate\Http\Request;



class RoadCardController extends Controller {

	/**
	 * Display a listing of roadcard
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $roadcard = RoadCard::all();

		return view('admin.roadcard.index', compact('roadcard'));
	}

	/**
	 * Show the form for creating a new roadcard
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{

	    $languages = Language::all();
	    $roadpoints = prepareForSelect(RoadPoint::all());
	    
	    return view('admin.roadcard.create', compact('roadpoints', 'languages'));
	}

	/**
	 * Store a newly created roadcard in storage.
	 *
     * @param CreateRoadCardRequest|Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRoadCardRequest $request)
	{
        $data = $request->all();
        unset($data['translations']);
		$roadcard = RoadCard::create($data);

        $this->createRoadCardTranslations($request, $roadcard);

		return redirect()->route(config('quickadmin.route').'.roadcard.index');
	}

	/**
	 * Show the form for editing the specified roadcard.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{

        $languages = Language::all();
		$roadcard = RoadCard::find($id);
        $roadpoints = prepareForSelect(RoadPoint::all());
	    
		return view('admin.roadcard.edit', compact('roadcard', 'roadpoints', 'languages'));
	}

	/**
	 * Update the specified roadcard in storage.
     * @param UpdateRoadCardRequest|Request $request
     *
	 * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function update($id, UpdateRoadCardRequest $request)
	{

        $data = $request->all();
        unset($data['translations']);
		$roadcard = RoadCard::findOrFail($id);

		$roadcard->update($data);

		$roadcard->translations()->delete();

        $this->createRoadCardTranslations($request, $roadcard);

		return redirect()->route(config('quickadmin.route').'.roadcard.index');
	}

	/**
	 * Remove the specified roadcard from storage.
	 *
	 * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{

		RoadCard::destroy($id);
		RoadCardTranslation::where('roadcard_id', $id)->delete();

		return redirect()->route(config('quickadmin.route').'.roadcard.index');
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

            $ids = RoadCard::all()->pluck('id');
        }

        foreach ($ids as $id) {

            $this->destroy($id);
        }

        return redirect()->route(config('quickadmin.route').'.roadcard.index');
    }

    protected function createRoadCardTranslations(Request $request, $roadcard)
    {
        foreach ($request->translations as $key => $value) {

            $translation = $value;
            $translation['locale'] = $key;

            $translationObj = new RoadCardTranslation($translation);
            $roadcard->translations()->save($translationObj);
        }
    }

}
