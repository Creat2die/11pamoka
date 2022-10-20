<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use App\Models\Dish;
use Illuminate\Http\Request;

class RestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restoran.index', [
            'restorans' => Restoran::orderBy('updated_at', 'desc')->get(),
        ]);

        return redirect()->route('r_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restoran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Restoran::create([
            'title' => $request->title,
            'city' => $request->city,
            'adress' => $request->adress,
            'workhours' => $request->workhours,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function show(Restoran $restoran)
    {
    
        return view('restoran.show', [
            'restoran' => $restoran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function edit(Restoran $restoran)
    {
        return view('restoran.edit', [
            'restoran' => $restoran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restoran $restoran)
    {
        $restoran->update(
            ['title' => $request->title,
            'city' => $request->city,
            'adress' => $request->adress,
            'workhours' => $request->workhours,]
        );
        return redirect()->route('r_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restoran $restoran)
    {
        if($restoran->dishes()->count()){
            return 'Negalima trinti kategoriju su filmais';
        }
        $restoran->delete();
        return redirect()->route('r_index');
    }

    public function destroyAll(Restoran $restoran){
        $ids = $restoran->dishes()->pluck('id')->all();
        Dish::destroy($ids);
        return redirect()->route('r_index');

        
    }
}
