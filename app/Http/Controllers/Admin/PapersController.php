<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use App\Language;
use App\PaperTranslation;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Redirect;
use Schema;
use App\Paper;
use App\Http\Requests\CreatePapersRequest;
use App\Http\Requests\UpdatePapersRequest;
use Illuminate\Http\Request;

use App\Tags;


class PapersController extends Controller
{

    /**
     * Display a listing of papers
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $papers = Paper::with("tag")->get();

        return view('admin.papers.index', compact('papers'));
    }

    /**
     * Show the form for creating a new paper
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tag = $this->prepareTags(Tags::all());
        $languages = Language::all();


        return view('admin.papers.create', compact("tag", 'languages'));
    }

    /**
     * Store a newly created paper in storage.
     *
     * @param CreatePapersRequest|Request $request
     *
     * * @return mixed
     */
    public function store(Request $request)
    {
        $main_img = $request->file('pictures.main_picture');
        $filename = time() . '.' . $main_img->getClientOriginalExtension();
        $path = public_path('img/blog/' . $filename);
        $previewPath = public_path('img/blog/previews/' . $filename);
        $img = Image::make($main_img->getRealPath());
        $img->save($path);
        $img->crop((int)$request->pictures['w'], (int)$request->pictures['h'], (int)$request->pictures['x'], (int)$request->pictures['y']);
        $img->save($previewPath);

        $paperData = $request->all();
        unset($paperData['pictures']);
        unset($paperData['translations']);
        $paperData['image'] = $filename;

        $paper = Paper::create($paperData);


        foreach ($request->file('pictures.album') as $picture) {

            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $path = public_path('img/blog/albums/' . $filename);
            $img = Image::make($picture->getRealPath());

            $img->save($filename);

            $albumImage = new Album(['image' => $path]);
            $paper->albumImages()->save($albumImage);
        }

        foreach ($request->translations as $key => $value) {

            $translation = $value;
            $translation['locale'] = $key;

            $translationObj = new PaperTranslation($translation);
            $paper->translations()->save($translationObj);
        }

        return redirect()->route(config('quickadmin.route') . '.papers.index');
    }

    /**
     * Show the form for editing the specified paper.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $paper = Paper::find($id);
        $tag = $this->prepareTags(Tags::all());
        $languages = Language::all();

        return view('admin.papers.edit', compact('paper', 'tag', 'languages'));
    }

    /**
     * Update the specified paper in storage.
     * @param UpdatePapersRequest|Request $request
     *
     * @param  int $id
     *
     * * @return mixed
     */
    public function update($id, UpdatePapersRequest $request)
    {
        $paper = Paper::findOrFail($id);


        $paper->update($request->all());

        return redirect()->route(config('quickadmin.route') . '.papers.index');
    }

    /**
     * Remove the specified paper from storage.
     *
     * @param  int $id
     *
     * * @return mixed
     */
    public function destroy($id)
    {
        Paper::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.papers.index');
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
            Paper::destroy($toDelete);
        } else {
            Paper::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route') . '.papers.index');
    }

    protected function prepareTags($tags)
    {
        $array = [];

        foreach ($tags as $tag) {

            $array[$tag->id] = $tag['name'];
        }

        return $array;
    }
}
