<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Album;
use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class AlbumController extends Controller {

	/**
	 * Display a listing of album
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $album = Album::all();

		return view('admin.album.index', compact('album'));
	}

	/**
	 * Show the form for creating a new album
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.album.create');
	}

	/**
	 * Store a newly created album in storage.
	 *
     * @param CreateAlbumRequest|Request $request
	 */
	public function store(CreateAlbumRequest $request)
	{
	    $request = $this->saveFiles($request);
		Album::create($request->all());

		return redirect()->route(config('quickadmin.route').'.album.index');
	}

	/**
	 * Show the form for editing the specified album.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$album = Album::find($id);
	    
	    
		return view('admin.album.edit', compact('album'));
	}

	/**
	 * Update the specified album in storage.
     * @param UpdateAlbumRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAlbumRequest $request)
	{
		$album = Album::findOrFail($id);

        $request = $this->saveFiles($request);

		$album->update($request->all());

		return redirect()->route(config('quickadmin.route').'.album.index');
	}

	/**
	 * Remove the specified album from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Album::destroy($id);

		return redirect()->route(config('quickadmin.route').'.album.index');
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
            Album::destroy($toDelete);
        } else {
            Album::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.album.index');
    }

}
