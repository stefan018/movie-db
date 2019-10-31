<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $movies = \App\Movie::orderBy('release_date', 'ASC')->where('release_date', '>', date('Y-m-d'))->take(2)->get();
        $series = \App\Serie::where('premiere', '>', date('Y-m-d'))->orderBy('premiere', 'ASC')->take(3)->get();
        return view('index', compact('movies', 'series'));
    }
}
