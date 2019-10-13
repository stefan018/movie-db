<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenresController extends Controller
{
    public function index()
    {
    	$genres = Genre::all();
    	return view('genres.index', compact('genres'));
    }

    public function store(Request $request)
    {
    	$attributes = $request->validate([
    		'name' => ['required','min:2','max:99']
    	]);
    	Genre::create($attributes);
    	return redirect()->route('genres.index');
    }

    public function edit($id)
    {
    	$genre = Genre::findOrFail($id);
    	return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
    	$attributes = $request->validate([
    		'name' => ['required', 'min:2', 'max:99']
    	]);
    	Genre::find($id)->update($attributes);
    	return redirect()->back(); 
    }

    public function destroy($id)
    {
    	$genre = Genre::findOrFail($id);
    	$genre->movies()->detach();
    	$genre->series()->detach();
    	$genre->delete();
    	return redirect()->route('genres.index');
    }
}
