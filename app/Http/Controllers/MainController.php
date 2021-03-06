<?php

namespace App\Http\Controllers;

use App\Key;
use App\Language;
use App\Messages;
use App\Paper;
use App\RoadPoint;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

//use App\Mail\NewMessage;
//use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $keys = Key::all()->keyBy('key');
        $languages = $this->getLanguages();
        $locale = Cookie::get('locale') ? Cookie::get('locale') : Config::get('app.locale');
        $title = $keys['title_index']->translate($locale)->name;

        return view('page', compact('title', 'languages', 'locale', 'keys'));
    }

    public function blog(Request $request)
    {

        $keys = Key::all()->keyBy('key');
        $perPage = Config::get('per_page', 3);
        $locale = Cookie::get('locale') ? Cookie::get('locale') : Config::get('app.locale');

        if ($request->ajax()) {

            $tag = Tags::where('name', $request->tag)->first();
            $papers = Paper::where('tag_id', $tag->id)->latest()->paginate($perPage);
            $return = [

                'papers' => (string)view('partials.papers', compact('papers', 'locale', 'keys')),
                'nextPageUrl' => url('blog?page=' . ($request->page + 1) . '&tag=' . $tag->name)
            ];

            return $return;
        }

        $title = $keys['title_blog']->translate($locale)->name;
        $tags = Tags::all();
        $languages = $this->getLanguages();
        $papers = Paper::where('tag_id', $tags->first()->id)->latest()->paginate($perPage);
        $active = $tags->first()->name;

        return view('blog', compact('tags', 'title', 'papers', 'locale', 'active', 'languages', 'keys'));
    }

    public function papers(Request $request)
    {

        if (!isset($request->tag)) {

            return response('Invalid data', 400);
        }

        $languages = $this->getLanguages();
        $keys = Key::all()->keyBy('key');
        $locale = Cookie::get('locale') ? Cookie::get('locale') : Config::get('app.locale');
        $tagId = Tags::where('name', $request->tag)->first()->id;
        $papers = Paper::where('tag_id', $tagId)->get();

        return view('partials.papers', compact('papers', 'locale', 'keys', 'languages'));

    }

    public function paper($id)
    {

        $paper = Paper::findOrFail($id);

        if (!$paper) {

            abort(404);
        }

        ++$paper->views;
        $paper->save();

        $locale = Cookie::get('locale') ? Cookie::get('locale') : Config::get('app.locale');
        $title = $paper->translate($locale)->title;
        $related = Paper::where('id', '<', $id)->limit(3)->get();
        $keys = Key::all()->keyBy('key');
        $languages = $this->getLanguages();

        return view('article', compact('paper', 'locale', 'related', 'languages', 'keys', 'title'));


    }

    public function roadmap($tag = '')
    {

        $keys = Key::all()->keyBy('key');
        $locale = Cookie::get('locale') ? Cookie::get('locale') : Config::get('app.locale');
        $title = $keys['title_roadmap']->translate($locale)->name;
        $tags = Tags::all();
        $languages = $this->getLanguages();

        setlocale(LC_TIME, $locale);

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

        return view('roadmap', compact('title', 'tags', 'pastPoints', 'futurePoints', 'active', 'languages', 'locale', 'keys'));
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

    public function message(Request $request)
    {
        $request->validate([

            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        $message = Messages::create($request->all());
//
//        \Mail::raw($message->name.PHP_EOL.$message->text, function($msg) {
//            $msg->subject('New message')->to('riznyk.uliana.a@gmail.com');
//        });

        return redirect()->back();
    }

    public function policy()
    {
        $locale = Cookie::get('locale') ? Cookie::get('locale') : Config::get('app.locale');
        $keys = Key::all()->keyBy('key');
        $title = $keys['title_policy']->translate($locale)->name;
        $languages = $this->getLanguages();

        return view('policy', compact('languages', 'keys', 'locale', 'title'));
    }
}
