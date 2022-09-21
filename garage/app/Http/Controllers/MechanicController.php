<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $perPage = match($request->per_page){
            'all' => 1000000,
            '5' => 5,
            '10' => 10,
            '20' => 20,
            '50' => 50,
            default => 5,
        };

        $mechanics = match ($request->sort) {
            'name_asc' => Mechanic::orderBy('name', 'asc')->paginate($perPage)->withQueryString(),
            'name_desc' => Mechanic::orderBy('name', 'desc')->paginate($perPage)->withQueryString(),
            'surname_asc' => Mechanic::orderBy('surname', 'asc')->paginate($perPage)->withQueryString(),
            'surname_desc' => Mechanic::orderBy('surname', 'desc')->paginate($perPage)->withQueryString(),
            default => Mechanic::paginate($perPage)->withQueryString()
        };

        return view('mechanic.index', [
            'mechanics' => $mechanics,
            'sortSelect' => $request->sort,
            'perPage' => $request->per_page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mechanic = new Mechanic;
        $mechanic->name = $request->name;
        $mechanic->surname = $request->surname;
        $mechanic->save();
        return redirect()->route('m_index')->with('success_msg', 'Good job. We have new mechanic now.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        return view('mechanic.show', [
            'mechanic' => $mechanic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanic.edit', [
            'mechanic' => $mechanic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        $mechanic->name = $request->name;
        $mechanic->surname = $request->surname;
        $mechanic->save();
        return redirect()->route('m_index')->with('success_msg', 'Good job. Mechanic was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if ($mechanic->getTrucks()->count()) {
            return redirect()->back()->with('info_msg', 'Oh no, you can not delete this one.');
        }
        $mechanic->delete();
        return redirect()->route('m_index');

    }
}