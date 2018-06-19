<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Language;
use App\Http\Requests\CreateLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Http\Request;



class LanguageController extends Controller {

	/**
	 * Display a listing of language
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $language = Language::all();

		return view('admin.language.index', compact('language'));
	}

	/**
	 * Show the form for creating a new language
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.language.create');
	}

	/**
	 * Store a newly created language in storage.
	 *
     * @param CreateLanguageRequest|Request $request
	 */
	public function store(CreateLanguageRequest $request)
	{
	    
		Language::create($request->all());

		return redirect()->route(config('quickadmin.route').'.language.index');
	}

	/**
	 * Show the form for editing the specified language.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$language = Language::find($id);
	    
	    
		return view('admin.language.edit', compact('language'));
	}

	/**
	 * Update the specified language in storage.
     * @param UpdateLanguageRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateLanguageRequest $request)
	{
		$language = Language::findOrFail($id);

        

		$language->update($request->all());

		return redirect()->route(config('quickadmin.route').'.language.index');
	}

	/**
	 * Remove the specified language from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Language::destroy($id);

		return redirect()->route(config('quickadmin.route').'.language.index');
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
            Language::destroy($toDelete);
        } else {
            Language::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.language.index');
    }

}
