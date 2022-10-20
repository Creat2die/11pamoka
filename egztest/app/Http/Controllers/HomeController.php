<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Coment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{


    public function homeList(Request $request)
    {
        // Filter
        if ($request->s) {
            $search = explode(' ' , $request->s);
            if(count($search) == 1){
                $dishes = Dish::where('title', 'like', '%'.$request->s.'%');
            } else{
                $dishes = Dish::where('title', 'like', '%'.$search[0]. '%' .$search[1] . '%')
                ->orWhere('title', 'like', '%'.$search[1]. '%' .$search[0] . '%')
                ->orWhere('title', 'like', '%'.$search[0]. '%')
                ->orWhere('title', 'like', '%'.$search[1]. '%');
            }
        } else {
            $dishes = Dish::where('id', '>', 0);
        }

        // Sort
        if ($request->sort == 'rate_asc') {
            $dishes->orderBy('rating');
        }
        else if ($request->sort == 'rate_desc') {
            $dishes->orderBy('rating', 'desc');
        }
        else if ($request->sort == 'title_asc') {
            $dishes->orderBy('title');
        }
        else if ($request->sort == 'title_desc') {
            $dishes->orderBy('title', 'desc');
        }
        else if ($request->sort == 'price_asc') {
            $dishes->orderBy('price');
        }
        else if ($request->sort == 'price_desc') {
            $dishes->orderBy('price', 'desc');
        }
        
        
        
        return view('home.index', [
            'dishes' => $dishes->paginate(5)->withQueryString(),
            'sort' => $request->sort ?? '0',
            'sortSelect' => Dish::SORT_SELECT,
            's' => $request->s ?? '0',
        ]);
    }

    public function rate(Request $request, Dish $dish)
    {
        
        $votes = json_decode($dish->votes ?? json_encode([]));
        if(in_array(Auth::user()->id, ($votes))){
            return redirect()->back()->with('not', 'You already voted!');
        }
        $votes[] = Auth::user()->id;
        $dish->votes = json_encode ($votes);

        $dish->rating_sum = $dish->rating_sum + $request->rate;
        $dish->rating_count ++;
        $dish->rating = $dish->rating_sum / $dish->rating_count;
        $dish->save();
        return redirect()->back()->with('ok', 'Thnaks for your rating!');
    }


    public function addComent(Request $request, Dish $dish)
    {
        Coment::create([
            'dish_id' => $dish->id,
            'post' =>$request->post,
        ]);

        return redirect()->back();
    }

}