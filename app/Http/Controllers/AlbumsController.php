<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createReview($id)
    {
        return view('review-new', [
            'id' => $id
        ]);
    }
    // (15) Create a form on the page at the URL 
    // /albums/{id}/reviews/new with a text input for the review title and a textarea for the review body. 
    // When this form is submitted, it will make a POST request to /albums/{id}/reviews, where a review will be inserted in the reviews table for that album. 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $validation = Validator::make([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ], [
            'title' => 'required',
            'body' => 'required|min:10'
        ]);
        if ($validation->passes()) {
            DB::table('reviews')->insert([
                'body' => $request->input('body'),
                'title' => $request->input('title'),
                'album_id' => $id
            ]);

            return redirect("/albums/$id/reviews");
        } else {
            return redirect("/albums/$id/reviews/new")
                ->withInput()
                ->withErrors($validation);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reviews = DB::table('reviews')
            ->where('album_id', '=', $id)->get();
        return view('album-reviews', [
            'reviews' => $reviews,
            'id' => $id
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
    }
}
