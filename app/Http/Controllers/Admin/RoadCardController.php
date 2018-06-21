<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

	    $roadpoints = prepareForSelect(RoadPoint::all());
	    
	    return view('admin.roadcard.create', compact('roadpoints'));
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
	    
		RoadCard::create($request->all());

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

		$roadcard = RoadCard::find($id);
        $roadpoints = prepareForSelect(RoadPoint::all());
	    
		return view('admin.roadcard.edit', compact('roadcard', 'roadpoints'));
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

		$roadcard = RoadCard::findOrFail($id);

		$roadcard->update($request->all());

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

        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            RoadCard::destroy($toDelete);
        } else {
            RoadCard::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.roadcard.index');
    }



}
