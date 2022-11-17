<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restoran;

class HomeController extends Controller
{

    public function homeList(Request $request)
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
        else if ($request->sort == 'rate_asc') {
            $restorans->orderBy('rating', 'asc');
        }
        else if ($request->sort == 'rate_desc') {
            $restorans->orderBy('rating', 'desc');
        }



        return view('home.index',[
            'restorans' => $restorans->get(),
            'sort' => $request->sort ?? '0',
            'sortSelect' => Restoran::SORT_SELECT,
            's' => $request->s ?? '0',
        ]);
    }

        public function rate(Request $request, Restoran $restoran){
        $restoran->rating_sum = $restoran->rating_sum + $request->rate;
        $restoran->rating_count ++;
        $restoran->rating = $restoran->rating_sum / $restoran->rating_count;
        $restoran->save();
        return redirect()->back();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
