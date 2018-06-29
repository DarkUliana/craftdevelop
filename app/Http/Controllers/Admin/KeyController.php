<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KeyTranslation;
use App\Language;
use Redirect;
use Schema;
use App\Key;
use App\Http\Requests\CreateKeyRequest;
use App\Http\Requests\UpdateKeyRequest;
use Illuminate\Http\Request;



class KeyController extends Controller {

	/**
	 * Display a listing of key
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $keys = Key::all();

		return view('admin.key.index', compact('keys'));
	}

	/**
	 * Show the form for creating a new key
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
        $languages = Language::all();
	    
	    return view('admin.key.create', compact('languages'));
	}

	/**
	 * Store a newly created key in storage.
	 *
     * @param CreateKeyRequest|Request $request
	 */
	public function store(CreateKeyRequest $request)
	{
        $data = $request->all();
        unset($data['translations']);
		$key = Key::create($data);

        $this->createKeyTranslations($request, $key);

		return redirect()->route(config('quickadmin.route').'.key.index');
	}

	/**
	 * Show the form for editing the specified key.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{

        $languages = Language::all();
		$key = Key::find($id);
	    
	    
		return view('admin.key.edit', compact('key', 'languages'));
	}

	/**
	 * Update the specified key in storage.
     * @param UpdateKeyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateKeyRequest $request)
	{
        $data = $request->all();
        unset($data['translations']);

		$key = Key::findOrFail($id);

		$key->update($data);

        $key->translations()->delete();

        $this->createRoadCardTranslations($request, $key);

		return redirect()->route(config('quickadmin.route').'.key.index');
	}

	/**
	 * Remove the specified key from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Key::destroy($id);
		KeyTranslation::where('key_id', $id)->delete();

		return redirect()->route(config('quickadmin.route').'.key.index');
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

            $ids = Key::all()->pluck('id');
        }

        foreach ($ids as $id) {

            $this->destroy($id);
        }

        return redirect()->route(config('quickadmin.route').'.key.index');
    }

    protected function createKeyTranslations(Request $request, $key)
    {
        foreach ($request->translations as $k => $value) {

            $translation = $value;
            $translation['locale'] = $k;

            $translationObj = new KeyTranslation($translation);
            $key->translations()->save($translationObj);
        }
    }

}
