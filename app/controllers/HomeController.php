<?php

namespace App\Controllers;

use App\Models\Story;

class HomeController
{
    public function index()
    {
        $stories = Story::all();
        // dd($stories);
        return view('home', compact('stories'));
    }
    public function test()
    {
        $rss = simplexml_load_file('https://www.thehindu.com/news/cities/kolkata/feeder/default.rss');
        echo $rss;
        // return view('test');
    }
}
