<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restoran;
use Illuminate\Http\Request;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->rest) {
            $dishes = Dish::where('restoran_id', $request->rest);
        } else {
            $dishes = Dish::where('id', '>', 0);
        }

        // Sort
        if ($request->sort == 'name_asc') {
            $dishes->orderBy('name');
        }
        else if ($request->sort == 'name_desc') {
            $dishes->orderBy('name', 'desc');
        }
        else if ($request->sort == 'price_asc') {
            $dishes->orderBy('price');
        }
        else if ($request->sort == 'price_desc') {
            $dishes->orderBy('price', 'desc');
        }

        return view('dish.index',[
            'dishes' => $dishes->get(),
            'restorans' => Restoran::orderBy('name')->get(),
            'rest' => $request->rest ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Dish::SORT_SELECT,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('dish.create', [
            'restorans' => Restoran::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' =>'required',
            'price' =>'required',
            'restoran_id' =>'required',
        ]);

        Dish::create([
            'name' => $request->name,
            'price' => $request->price,
            'restoran_id' => $request->restoran_id,
        ])->addImages($request->file('photo'));

        return redirect()->route('d_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('dish.show', [
            'dish' => $dish,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('dish.edit', [
            'dish' => $dish,
            'restorans' => Restoran::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' =>'required',
            'price' =>'required',
            'restoran_id' =>'required',

        ]);

        $dish->update([
            'name' => $request->name,
            'price' => $request->price,
            'restoran_id' => $request->restoran_id,
        ]);
        $dish->removeImages($request->delete_photo)
        ->addImages($request->file('photo'));

        return redirect()->route('d_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if($dish->getPhotos()->count()){
            $delIds = $dish->getPhotos()->pluck('id')->all();
            $dish->removeImages($delIds);
        }

        $dish->delete();
        return redirect()->route('d_index');
    }
}
