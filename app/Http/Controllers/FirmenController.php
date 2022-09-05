<?php

namespace App\Http\Controllers;

use App\Models\Firmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firmen = DB::table('firmen')
        ->orderBy('firmenname', 'asc')
        ->get();
		return response()->json($firmen);
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
     * @param  \App\Models\Firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function show(Firmen $firmen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function edit(Firmen $firmen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firmen $firmen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firmen $firmen)
    {
        //
    }
}
