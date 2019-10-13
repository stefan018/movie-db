<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Serie;
use App\Cast;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$scope = $request->scope;
    	if($scope == 'all'){
    		return $this->general($request->search);
    	}elseif($scope == 'movies'){
    		return $this->movies($request->search);
    	}elseif($scope == "series"){
    		return $this->series($request->search);
    	}elseif($scope == "cast"){
    		return $this->cast($request->search);
    	}
    	
    }

    public function general($searchTerm)
    {
    	$movies = Movie::where('title', 'like', "%{$searchTerm}%")->get();
    	$series = Serie::where('title', 'like', "%{$searchTerm}%")->get();
    	$cast = Cast::where('name', 'like', "%{$searchTerm}%")->get();
    	return view('search.general', compact('movies', 'series', 'cast'));
    }

    public function movies($searchTerm)
    {
    	$movies = Movie::where('title', 'like', "%{$searchTerm}%")->get();
    	return view('search.movies', compact('movies'));
    }

    public function series($searchTerm)
    {
    	$series = Serie::where('title', 'like', "%{$searchTerm}%")->get();
    	return view('search.series', compact('series'));
    }

    public function cast($searchTerm)
    {
    	$cast = Cast::where('name', 'like', "%{$searchTerm}%")->get();
    	return view('search.cast', compact('cast'));
    }
}
