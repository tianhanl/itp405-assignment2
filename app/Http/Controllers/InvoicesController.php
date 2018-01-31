<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = DB::table('invoices')
            ->join('customers', 'invoices.')
            ->limit(10)
            ->get();
        dd($invoices);
        return view('invoices', [
            'invoices' => $invoices
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoiceID)
    {
        //
        $invoiceItems = DB::table('invoice_items')
            ->select('Quantity', 'invoice_items.UnitPrice', 'artists.Name as artistName', 'tracks.Name as trackName')
            ->join('tracks', 'invoice_items.TrackId', '=', 'tracks.TrackId')
            ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
            ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
            ->where('InvoiceId', '=', $invoiceID)
            ->get();

        return view('invoice-detail', [
            'invoiceItems' => $invoiceItems
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
