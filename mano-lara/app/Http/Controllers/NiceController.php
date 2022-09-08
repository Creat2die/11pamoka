<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NiceController extends Controller
{
    public function fun($kiek, $abc = 'Dramblys'){

        $mas = ['Asilas', 'Karvius', 'Bulius', 'Kalakutas'];
        return view('kitkas.fun', [
            'abc' => $abc,
            'mas' => $mas
        ]);
}
}