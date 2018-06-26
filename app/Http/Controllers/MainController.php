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

        if (isset($request->tag)) {

            $locale = Cookie::get('locale');
            $tagId = Tags::where('name', $request->tag)->first()->id;
            $papers = Paper::where('tag_id', $tagId)->get();

            return view('partials.papers', compact('papers', 'locale'));
        }

        return response('Invalid data', 400);
    }

    public function roadmap()
    {
        $title = 'Roadmap';
        $tags = Tags::all();
        $points = RoadPoint::where('tag_id', $tags->first()->id)->get();
//        var_dump($points); die();

        return view('roadmap', compact('title', 'tags', 'points'));
    }

    public function setLocale($locale)
    {

        if (in_array($locale, Config::get('app.locales'))) {
            Cookie::put('locale', $locale);
        }

        return redirect()->back();
    }
}
