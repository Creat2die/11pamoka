<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NiceController extends Controller
{
    public function fun($kiek, $abc = 'Dramblys'){

        $mas = ['Asilas', 'Karvius', 'Bulius', 'Kalakutas'];
        return view('kitkas.fun', [
            'abc' => $abc,
            'mas' => $mas,
            'kiek' => $kiek
        ]);
}
    public function showForm(Request $request){

        //$rez =$request->session()->pull('rez', 'NIEKO');
        //$rez =$request->session()->get('rez', 'NIEKO');

        return view('form');
    }

    public function doForm(Request $request){
        $x = $request->x;
        $y = $request->y;
        $rez =$x + $y;

        $request->session()->flash('rez',$rez);
      //  $request->session()->put('rez',$rez);

        return redirect()->route('show');

    }
}