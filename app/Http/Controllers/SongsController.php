<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use App\Http\Requests\StoreSongsRequest;
use App\Http\Requests\Request;//change to: Request
use Inertia\Inertia;//Import

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $songs = Songs::all();//Save all songs in DB
        return Inertia::render('Songs/Index', ['songs' => $songs]);//View all songs
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'autor'=>'required',
            'album'=>'required',
        ]);
        $song = new Songs($request->input());
        $song->save();
        return redirect('song');
    }

    /**
     * Display the specified resource.
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Songs $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Songs $songs)
    {
        //
        $song = Songs::find($id);//Search info. ID
        $song->fill($request->input())->saveOrFail();//Update info.
        return redirect('song');//redirect view Songs
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /*
        $song = Songs::find($id);
        $song->delete();*/
        $song = Songs::find($id)->delete();//Find and delete song by id
        return redirect('song');
    }
}
