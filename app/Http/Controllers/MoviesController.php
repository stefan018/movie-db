<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests\StoreMovieRequest;
use Illuminate\Filesystem\Filesystem;

class MoviesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin', 'auth'])->except('index', 'show');
    }


    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = \App\Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {

        $attributes = $request->except('genre');
        if($request->hasFile('cover')){
        $attributes['cover'] = time() . '.' . $request->cover->getClientOriginalExtension();
        $request->cover->move(public_path('/images/uploads'), $attributes['cover']);
        }
        Movie::create($attributes)->genres()->attach($request->genre);
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {   
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $movie = Movie::findOrFail($id);
        $genres = \App\Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMovieRequest $request, $id)
    {

        $movie = Movie::findOrFail($id);
        $attributes = $request->except('genre');
        
        if($request->hasFile('cover')){
            $attributes['cover'] = time() . '.' . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('/images/uploads'), $attributes['cover']);
            @unlink(public_path('/images/uploads/') . $movie->cover);
        }

        $movie->update($attributes);
        $movie->genres()->sync($request->genre);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $movie = Movie::findOrFail($id);
        $movie->genres()->detach();
        @unlink(public_path('images/uploads/') . $movie->cover);
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
