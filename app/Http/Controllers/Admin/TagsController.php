<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Tags;
use App\Http\Requests\CreateTagsRequest;
use App\Http\Requests\UpdateTagsRequest;
use Illuminate\Http\Request;



class TagsController extends Controller {

	/**
	 * Display a listing of tags
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $tags = Tags::all();

		return view('admin.tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new tags
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.tags.create');
	}

	/**
	 * Store a newly created tags in storage.
	 *
     * @param CreateTagsRequest|Request $request
	 */
	public function store(CreateTagsRequest $request)
	{
	    
		Tags::create($request->all());

		return redirect()->route(config('quickadmin.route').'.tags.index');
	}

	/**
	 * Show the form for editing the specified tags.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$tags = Tags::find($id);
	    
	    
		return view('admin.tags.edit', compact('tags'));
	}

	/**
	 * Update the specified tags in storage.
     * @param UpdateTagsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTagsRequest $request)
	{
		$tags = Tags::findOrFail($id);

        

		$tags->update($request->all());

		return redirect()->route(config('quickadmin.route').'.tags.index');
	}

	/**
	 * Remove the specified tags from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Tags::destroy($id);

		return redirect()->route(config('quickadmin.route').'.tags.index');
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
            Tags::destroy($toDelete);
        } else {
            Tags::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.tags.index');
    }

}
