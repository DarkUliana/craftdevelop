<?php

namespace App\Http\Controllers;

use App\Paper;
use App\RoadPoint;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function blog()
    {

        $locale = Cookie::get('locale') or Config::get('locale');
        $title = 'Blog';
        $tags = Tags::all();
        $papers = Paper::where('tag_id', $tags->first()->id)->get();

        return view('blog', compact('tags', 'title', 'papers', 'locale'));
    }

    public function papers(Request $request)
    {

        if (!isset($request->tag)) {

            return response('Invalid data', 400);
        }

        $locale = Cookie::get('locale');
        $tagId = Tags::where('name', $request->tag)->first()->id;
        $papers = Paper::where('tag_id', $tagId)->get();

        return view('partials.papers', compact('papers', 'locale'));

    }

    public function paper($id)
    {

        $paper = Paper::find($id);

        if ($paper) {

            $localization = Cookie::get('localization');
            $related = Paper::where('id', '<', $id)->limit(3)->get();

            return view('article', compact('paper', 'localization', 'related'));
        }

        abort(404);
    }

    public function roadmap()
    {
        $title = 'Roadmap';
        $tags = Tags::all();
        $pastPoints = RoadPoint::where('tag_id', $tags->first()->id)->where('done', 1)->get();
        $futurePoints = RoadPoint::where('tag_id', $tags->first()->id)->where('done', 0)->get();

//        var_dump($pastPoints->merge($futurePoints)); die();
        return view('roadmap', compact('title', 'tags', 'pastPoints', 'futurePoints'));
    }

    public function points(Request $request)
    {
        if (!isset($request->tag)) {

            return response('Invalid data', 400);
        }

        $pastPoints = RoadPoint::where('tag_id', Tags::where('name', $request->tag)->first()->id)->where('done', 1)->get();
        $futurePoints = RoadPoint::where('tag_id', Tags::where('name', $request->tag)->first()->id)->where('done', 0)->get();

//        $return = [
//            'points' => (String)view('partials.points', compact('pastPoints', 'futurePoints')),
//            'cards' => (String)view('partials.cards', compact('pastPoints', 'futurePoints'))
//        ];
//        var_dump($return); die();
//        var_dump(view('partials.points', compact('pastPoints', 'futurePoints'))); die();

        return view('partials.points', compact('pastPoints', 'futurePoints'));
    }

    public function setLocale($locale)
    {

        if (in_array($locale, Config::get('app.locales'))) {
            Cookie::put('locale', $locale);
        }

        return redirect()->back();
    }
}
