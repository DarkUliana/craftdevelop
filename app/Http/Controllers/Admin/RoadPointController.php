<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
	    $tags = prepareForSelect(Tags::all());
	    
	    return view('admin.roadpoint.create', compact('tags'));
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

		RoadPoint::create($request->all());

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

		$roadpoint = RoadPoint::find($id);

        $tags = prepareForSelect(Tags::all());

		return view('admin.roadpoint.edit', compact('roadpoint', 'tags'));
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

		$roadpoint = RoadPoint::findOrFail($id);

		$roadpoint->update($request->all());

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
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            RoadPoint::destroy($toDelete);
        } else {
            RoadPoint::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.roadpoint.index');
    }

}
