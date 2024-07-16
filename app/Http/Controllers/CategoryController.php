<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Termwind\Components\Dd;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Blog::all();
        return view('categories.index',   ['categories' => Category::all()]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        // $request->validate([
        //     'title' => 'required|min:3'
        // ]);

        $data = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
        ];

        Category::create($data);
        return redirect('/categories');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('categories.show',  ['category' => Category::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('categories.edit',  ['category' => Category::find($slug)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
        ];

        Category::where('id', $id)->update($data);
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect('/categories');
    }
}
