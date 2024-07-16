<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Blog::all();
        return view('blogs/index',   ['blogs' => Blog::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
        ];

        Blog::create($data);
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blogs.show',  ['blog' => Blog::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blogs.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::where('id', $id)->delete();
        return redirect('/blogs');
    }
}
