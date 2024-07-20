<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Blog::all();
        // return view('blogs/index',   ['blogs' => Blog::all()]);
        $userId = Auth::id();
        $blogs = Blog::latest()->where('user_id', $userId);

        if (request('search')) {
            $blogs->where('title', 'like', '%' . request('search') . '%');
        }


        return view('blogs.index',   ['blogs' => $blogs->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create', ['categories' => Category::all()]);
    }

    public function print()
    {
        return view('blogs.print', ['blogs' => Blog::all()]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->input('category_id'),
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'image' => $request->file('image')->store('blog-images'),
            'slug' =>  Str::slug($request->input('title')),
            'excerpt' => Str::limit(strip_tags($request->body)),
            'body' => $request->input('body'),
        ];
        // $request->file('image')->store('blog-images');

        Blog::create($data);
        return redirect('/blogs')->with('success', 'data sussesfully added');
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
        return view('blogs.edit', [
            'blog' => Blog::find($id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->image) {
            Storage::delete($request->old_image);
            $data = [
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'image' => $request->file('image')->store('blog-images'),
                'slug' => Str::slug($request->input('title')),
                'excerpt' => Str::limit(strip_tags($request->body)),
                'body' => $request->input('body'),
            ];
        } else {
            $data = [
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'excerpt' => Str::limit(strip_tags($request->body)),
                'body' => $request->input('body'),
            ];
        }



        Blog::where('id', $id)->update($data);
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        Storage::delete($request->image);
        Blog::where('id', $id)->delete();
        return redirect('/blogs');
    }
}
