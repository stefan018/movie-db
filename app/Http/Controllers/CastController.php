<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cast;
use App\Http\Requests\StoreCastRequest;

class CastController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin', 'auth'])->except('index', 'show');
    }

    public function index()
    {
        $cast = Cast::all();
        return view('cast.index', compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCastRequest $request)
    {
        $attributes = $request->all();
        if($request->hasFile('photo')){
            $attributes['photo'] = time() . '.' 
                . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images/uploads'), $attributes['photo']);
        }
        Cast::create($attributes);
        return redirect()->route('cast.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $celeb = Cast::findOrFail($id);
        return view('cast.show', compact('celeb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $celeb = Cast::findOrFail($id);
        return view('cast.edit', compact('celeb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCastRequest $request, $id)
    {
        $celeb = Cast::findOrFail($id);
        $attributes = $request->all();
        
        if($request->hasFile('photo')){
            $attributes['photo'] = time() . '.' 
                . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images/uploads'), $attributes['photo']);
            @unlink(public_path('/images/uploads/') . $celeb->photo);
        }

        $celeb->update($attributes);
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
        $celeb = Cast::findOrFail($id);
        @unlink(public_path('/images/uploads/') . $celeb->photo);
        $celeb->delete();
        return redirect()->route('cast.index');
    }
}
