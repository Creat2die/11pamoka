<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $c = collect();
        $c->add('A');
        $c->add('F');

        $c = $c->sort(fn($x, $y) => $x <=> $y);

        $blogs = Blog::all();
        return view('blog.index', ['blogs' => $blogs, 'c'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {


    $validated = $request->validate([
        'title' => 'required|min:4|regex:/^\d+$/i',
        'body' => 'required',
    ], [
        'title.regex' =>'Viskas labai blogai',
        'title.min'=> 'Pertrumpas Post pavadinimas'
    ]);
 
    // The blog post is valid...


        $blog = new Blog;
        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->save();
        return redirect()->route('index')->with('success_msg', 'Tu pasaka');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|regex:/^\d+$/i',
            'body' => 'required',
        ], [
            'title.regex' =>'Viskas labai blogai',
            'title.min'=> 'Pertrumpas Post pavadinimas'
        ]);

        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('index');
    }
}