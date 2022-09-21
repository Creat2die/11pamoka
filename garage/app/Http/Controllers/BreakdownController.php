<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\Mechanic;
use App\Http\Requests\Request;

class BreakdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanics = Mechanic::orderBy('surname')->get();
        return view('breakdown.index', [
            'mechanics' => $mechanics,
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
     * @param  \App\Http\Requests\žRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(žRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function show(Breakdown $breakdown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function edit(Breakdown $breakdown)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\žRequest  $request
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function update(žRequest $request, Breakdown $breakdown)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breakdown  $breakdown
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breakdown $breakdown)
    {
        //
    }
}
