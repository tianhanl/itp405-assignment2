<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Playlist;

class PlaylistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $playlists = Playlist::all();
        return view('playlists-list', [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create-playlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make([
            'playlistName' => $request->input('playlist')
        ], [
            'playlistName' => 'required|min:3'
        ]);
        if ($validation->passes()) {
            // DB::table('playlists')->insert([
            //     'Name' => $request->input('playlist')
            // ]);
            $playlist = new Playlist();
            $playlist->Name = $request->input('playlist');
            $playlist->save();
            return redirect('/playlists');
        } else {
            return redirect('/playlists/new')
                ->withInput()
                ->withErrors($validation);
        }

    }

    /**
     * Display the specified resource.
     *ails 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $playlist = Playlist::find($id);

        $tracks = $playlist->Tracks;


        return view('playlist-details', [
            'playlist' => $playlist,
            'tracks' => $tracks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $playlist = Playlist::find($id);
        return view('edit-playlist', [
            'playlist' => $playlist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validation = Validator::make([
            'playlistName' => $request->input('playlist')
        ], [
            'playlistName' => 'required|min:3'
        ]);
        if ($validation->passes()) {
            $playlist = Playlist::find($id);
            $playlist->Name = $request->input('playlist');
            $playlist->save();
            return redirect('/playlists');
        } else {
            return redirect("/playlists/{$id}/edit")
                ->withInput()
                ->withErrors($validation);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $playlist = Playlist::find($id);
        $playlist->delete();
        return redirect('/playlists');
    }
}
