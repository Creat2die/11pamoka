<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use App\Models\Movie;
use Illuminate\Http\Request;


class ComentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coment.index', [
            'movies' => Movie::orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }

 
    public function destroy(Coment $coment)
    {
        $coment->delete();
        return redirect()->back();
    }
}
