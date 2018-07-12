<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePapersRequest;
use App\Http\Requests\UpdatePapersRequest;
use App\Language;
use App\Paper;
use App\PaperTranslation;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Redirect;
use Schema;
use Validator;


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
    public function store(CreatePapersRequest $request)
    {
        $paperData = $request->all();
        unset($paperData['pictures']);
        unset($paperData['translations']);
        $paperData['image'] = $this->createMainImage($request);

        $paper = Paper::create($paperData);

        $this->createPaperTranslations($request, $paper);
        $this->createPaperAlbum($request, $paper);

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
        $paper = Paper::find($id);

        $paper->translations()->delete();

        $paperData = $request->all();
        unset($paperData['pictures']);
        unset($paperData['translations']);

        if ($request->hasFile('pictures.main_picture')) {
            $paperData['image'] = $this->createMainImage($request);
        }

        if ($request->hasFile('pictures.album')) {
            $paper->albumImages()->delete();
            $this->createPaperAlbum($request, $paper);
        }

        $paper->update($paperData);

        $this->createPaperTranslations($request, $paper);

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
        $paper = Paper::find($id);

        $this->deletePaperAlbum($paper);
        $paper->translations()->delete();

        $paper->delete();

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
        $ids = [];
        if ($request->get('toDelete') != 'mass') {

            $ids = json_decode($request->get('toDelete'));
        } else {

            $ids = Paper::all()->pluck('id');
        }

        foreach ($ids as $id) {

            $this->destroy($id);
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

    protected function deletePaperAlbum($paper)
    {

        Storage::delete([public_path('img/blog/previews/' . $paper->image), public_path('img/blog/' . $paper->image)]);

        foreach ($paper->albumImages as $image) {

            Storage::delete(public_path('img/blog/albums/' . $image->image));
        }

        $paper->albumImages()->delete();

    }

    protected function createPaperAlbum(Request $request, $paper)
    {

        if ($request->file('pictures.album')) {
            foreach ($request->file('pictures.album') as $picture) {

                $filename = uniqid() . '.' . $picture->getClientOriginalExtension();
                $path = public_path('img/blog/albums/' . $filename);
                $img = Image::make($picture->getRealPath());

                $img->save($path);

                $albumImage = new Album(['image' => $filename]);
                $paper->albumImages()->save($albumImage);
            }
        }
    }

    protected function createPaperTranslations(Request $request, $paper)
    {

        foreach ($request->translations as $key => $value) {

            $translation = $value;
            $translation['locale'] = $key;

            $translationObj = new PaperTranslation($translation);
            $paper->translations()->save($translationObj);
        }
    }

    protected function createMainImage(Request $request)
    {

        $main_img = $request->file('pictures.main_picture');
        $filename = 'main_' . uniqid() . '.' . $main_img->getClientOriginalExtension();
        $path = public_path('img/blog/' . $filename);
        $previewPath = public_path('img/blog/previews/' . $filename);
        $img = Image::make($main_img->getRealPath());
        $img->save($path);
        $img->crop((int)$request->pictures['w'], (int)$request->pictures['h'], (int)$request->pictures['x'], (int)$request->pictures['y']);
        $img->save($previewPath);

        return $filename;
    }


    public function ckeditorUpload(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'upload' => 'required|image',
        ]);

        if ($validator->fails()) {

            $result = [
                'uploaded' => 0,
                'error' => [
                    'message' => "The file is not an image"
                ]
            ];

            return $result;
        }

//        $funcNum = $request->input('CKEditorFuncNum');

        $image = $request->file('upload');
        $filename = 'ckeditor_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $path = public_path('img/ckeditor/' . $filename);
        $url = url('img/ckeditor/' . $filename);
        $img = Image::make($image->getRealPath());
        $img->save($path);

        $result = [
            'uploaded' => 1,
            'url' => $url,
            'value' => $path,
            'error' => [
                'message' => "The file already exist and has been renamed to $filename"
            ]
        ];

        return $result;
    }
}
