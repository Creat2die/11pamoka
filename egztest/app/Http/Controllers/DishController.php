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
    public function index()
    {
        return view('dish.index', [
            'dishes' => Dish::orderBy('updated_at', 'desc')->paginate(5),
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
            'restorans' => Restoran::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:20',
            'price' => 'required|numeric|min:1|max:100',
            'photo.*' => 'sometimes|required|mimes:jpg|max:3000',
        ],
        [
            'title.required' => 'Nėra tilte',
            'title.min' => 'Title per trumpas',
            'title.max' => 'Title per ilgas',
            'price.required' => 'Nėra kainos',
        ]);

        Dish::create([
            'title' => $request->title,
            'price' => $request->price,
        ])->addImages($request->file('photo'));

        return redirect()->route('d_index')->with('ok', 'All good!');
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
            'restorans' => Restoran::orderBy('updated_at', 'desc')->get(),
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'title' => 'required|min:3|max:20',
            'price' => 'required|numeric|min:1|max:100',
            'photo.*' => 'sometimes|required|mimes:jpg|max:3000',
            'restoran_id' => $request->restoran_id,
        ]);

        $dish->update([
            'title' => $request->title,
            'price' => $request->price,
            
        ]);
        $dish
        ->removeImages($request->delete_photo)
        ->addImages($request->file('photo'));

        return redirect()->route('d_index')->with('ok', 'All good!');
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

        $title = $dish->title;
        $dish->delete();
        return redirect()->route('d_index')->with('ok', "$title gone!");
    }
}
