<?php

namespace App\Http\Controllers;

use App\Models\Mitarbeiter;
use App\Http\Requests\StoreMitarbeiterRequest;
use App\Http\Requests\UpdateMitarbeiterRequest;
use Illuminate\Support\Facades\DB;

class MitarbeiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mitarbeiter = DB::table('mitarbeiter')
        ->orderBy('nachname', 'asc')
        ->orderBy('vorname', 'asc')
        ->get();

      return response()->json($mitarbeiter);
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
     * @param  \App\Http\Requests\StoreMitarbeiterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMitarbeiterRequest $request)
    {
      $mitarbeiter = Mitarbeiter::create($request->all());

      return response()->json($mitarbeiter);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitarbeiter  $mitarbeiter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $mitarbeiter = DB::table('mitarbeiter')
        ->where('firmen_id',$id)
        ->orderBy('nachname', 'asc')
        ->orderBy('vorname', 'asc')
        ->get();

      return response()->json($mitarbeiter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitarbeiter  $mitarbeiter
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitarbeiter $mitarbeiter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMitarbeiterRequest  $request
     * @param  \App\Models\Mitarbeiter  $mitarbeiter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMitarbeiterRequest $request, Mitarbeiter $mitarbeiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitarbeiter  $mitarbeiter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitarbeiter $mitarbeiter)
    {
        //
    }
}
