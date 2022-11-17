<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use Illuminate\Http\Request;

class RestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // Filter
        if ($request->s) {

            $search = explode(' ' , $request->s);

            if(count($search) == 1){
                $restorans = Restoran::where('name', 'like', '%'.$request->s.'%');
            } else{
                $restorans = Restoran::where('name', 'like', '%'.$search[0]. '%' .$search[1] . '%')
                ->orWhere('name', 'like', '%'.$search[1]. '%' .$search[0] . '%')
                ->orWhere('name', 'like', '%'.$search[0]. '%')
                ->orWhere('name', 'like', '%'.$search[1]. '%');
            }
        } else {
            $restorans = Restoran::where('id', '>', 0);
        }

        // Sort
      
        if ($request->sort == 'name_asc') {
            $restorans->orderBy('name');
        }
        else if ($request->sort == 'name_desc') {
            $restorans->orderBy('name', 'desc');
        }
        else if ($request->sort == 'rate_desc') {
            $restorans->orderBy('rating', 'desc');
        }
        else if ($request->sort == 'rate_desc') {
            $restorans->orderBy('rating', 'desc');
        }



        return view('restoran.index',[
            'restorans' => $restorans->get(),
            'sort' => $request->sort ?? '0',
            'sortSelect' => Restoran::SORT_SELECT,
            's' => $request->s ?? '0',
        ]);
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
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'city' =>'required',
            'workhours' =>'required',
            'adress' =>'required',
        ]);

        Restoran::create([
            'name' => $request->name,
            'city' => $request->city,
            'workhours' => $request->workhours,
            'adress' => $request->adress,
        ]);

        return redirect()->route('r_index');
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
            'restoran' => $restoran,
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
     * @param  \App\Http\Requests\UpdateRestoranRequest  $request
     * @param  \App\Models\Restoran  $restoran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restoran $restoran)
    {
        $request->validate([
            'name' =>'required',
            'city' =>'required',
            'workhours' =>'required',
            'adress' =>'required',
        ]);

        $restoran->update([
            'name' => $request->name,
            'city' => $request->city,
            'workhours' => $request->workhours,
            'adress' => $request->adress,
        ]);
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
        $restoran->getDishes()->delete();
        $restoran->delete();
        return redirect()->route('r_index');
    }
}
