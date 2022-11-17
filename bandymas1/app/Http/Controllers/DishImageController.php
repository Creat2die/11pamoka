<?php

namespace App\Http\Controllers;

use App\Models\DishImage;
use App\Http\Requests\StoreDishImageRequest;
use App\Http\Requests\UpdateDishImageRequest;

class DishImageController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function show(DishImage $dishImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function edit(DishImage $dishImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishImageRequest  $request
     * @param  \App\Models\DishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishImageRequest $request, DishImage $dishImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DishImage  $dishImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DishImage $dishImage)
    {
        //
    }
}
