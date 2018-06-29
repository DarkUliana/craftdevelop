<?php

namespace App\Http\Controllers;

use App\Language;
use App\Paper;
use App\RoadPoint;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function index()
    {
        $languages = $this->getLanguages();
        $locale = Cookie::get('locale')?Cookie::get('locale'):Config::get('app.locale');
        $title = 'Index page';
        return view('page', compact('title', 'languages', 'locale'));
    }

    public function blog(Request $request)
    {

        $perPage = Config::get('per_page', 3);
        $locale = Cookie::get('locale')?Cookie::get('locale'):Config::get('app.locale');

        if ($request->ajax()) {

            $tag = Tags::where('name', $request->tag)->first();
            $papers = Paper::where('tag_id', $tag->id)->paginate($perPage);
            $return = [

                'papers' => (string)view('partials.papers', compact('papers', 'locale')),
                'nextPageUrl' => url('blog?page=' . ($request->page + 1) . '&tag=' . $tag->name)
            ];

            return $return;
        }

        $title = 'Blog';
        $tags = Tags::all();
        $languages = $this->getLanguages();
        $papers = Paper::where('tag_id', $tags->first()->id)->paginate($perPage);
        $active = $tags->first()->name;

        return view('blog', compact('tags', 'title', 'papers', 'locale', 'active', 'languages'));
    }

    public function papers(Request $request)
    {

        if (!isset($request->tag)) {

            return response('Invalid data', 400);
        }

        $locale = Cookie::get('locale')?Cookie::get('locale'):Config::get('app.locale');
        $tagId = Tags::where('name', $request->tag)->first()->id;
        $papers = Paper::where('tag_id', $tagId)->get();

        return view('partials.papers', compact('papers', 'locale'));

    }

    public function paper($id)
    {

        $paper = Paper::find($id);

        if ($paper) {

            $locale = Cookie::get('locale')?Cookie::get('locale'):Config::get('app.locale');
            $related = Paper::where('id', '<', $id)->limit(3)->get();

            return view('article', compact('paper', 'locale', 'related'));
        }

        abort(404);
    }

    public function roadmap($tag = '')
    {
        $title = 'Roadmap';
        $tags = Tags::all();
        $languages = $this->getLanguages();
        $locale = Cookie::get('locale')?Cookie::get('locale'):Config::get('app.locale');
        setlocale(LC_TIME, 'German');

        if (empty($tag)) {

            $active = $tags->first()->name;
            $pastPoints = RoadPoint::where('tag_id', $tags->first()->id)->where('done', 1)->get();
            $futurePoints = RoadPoint::where('tag_id', $tags->first()->id)->where('done', 0)->get();
        } else {

            $tag = Tags::where('name', $tag)->first();
            $active = $tag->name;
            $pastPoints = RoadPoint::where('tag_id', $tag->id)->where('done', 1)->get();
            $futurePoints = RoadPoint::where('tag_id', $tag->id)->where('done', 0)->get();
        }

        return view('roadmap', compact('title', 'tags', 'pastPoints', 'futurePoints', 'active', 'languages', 'locale'));
    }

    public function points(Request $request)
    {
        if (!isset($request->tag)) {

            return response('Invalid data', 400);
        }

        $tagId = Tags::where('name', $request->tag)->first()->id;
        $pastPoints = RoadPoint::where('tag_id', $tagId)->where('done', 1)->get();
        $futurePoints = RoadPoint::where('tag_id', $tagId)->where('done', 0)->get();

        $return = [
            'points' => (string)view('partials.points', compact('pastPoints', 'futurePoints')),
            'cards' => (string)view('partials.cards', compact('pastPoints', 'futurePoints'))
        ];

        return response($return, 200);
    }

    public function setLocale($locale)
    {
       $cookie = Cookie::forever('locale', $locale);

        Config::set('locale', $locale);

        return redirect()->back()->withCookie($cookie);
    }

    protected function getLanguages()
    {
        $languages = Language::where('active', 1)->get();
        $array = [];

        foreach ($languages as $language) {

            $array[$language->code] = $language->menu_name;
        }
        return $array;
    }
}
