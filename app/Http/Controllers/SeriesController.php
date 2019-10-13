<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSerieRequest;
use App\Serie;

class SeriesController extends Controller
{
   public function __construct()
   {
        $this->middleware(['admin', 'auth'])->except('index', 'show');
   }
    public function index()
    {
        $series = Serie::all();
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = \App\Genre::all();
        return view('series.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSerieRequest $request)
    {
        $attributes = $request->except('genre');
        if($request->hasFile('cover')){
            $attributes['cover'] = time() . '.' 
                . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('/images/uploads'), $attributes['cover']);
        }
        Serie::create($attributes)->genres()->attach($request->genre);
        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::findOrFail($id);
        return view('series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        $genres = \App\Genre::all();
        return view('series.edit', compact('serie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSerieRequest $request, $id)
    {
        $serie = Serie::findOrFail($id);
        $attributes = $request->except('genre');
        if($request->hasFile('cover')){
            $attributes['cover'] = time() . '.' 
                . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('/images/uploads'), $attributes['cover']);
            @unlink(public_path('/images/uploads/') . $serie->cover);
        }
        $serie->update($attributes);
        $serie->genres()->sync($request->genre);
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
        $serie = Serie::find($id);
        $serie->genres()->detach();
        @unlink(public_path('/images/uploads/') . $serie->cover);
        $serie->delete();
        return redirect()->route('series.index');
    }
}
