<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;


class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Blog::all();
        // return view('blogs/index',   ['blogs' => Blog::all()]);
        $blogs = Blog::with(['author', 'category'])->latest();
        if (request('search')) {
            $blogs->where('title', 'like', '%' . request('search') . '%');
        }


        return view('admin.blogs.index',   ['blogs' => $blogs->paginate(5)->withQueryString()]);
    }

    public function print()
    {
        return view('admin.blogs.print', ['blogs' => Blog::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function status(Request $request, string $id)
    {
        $data = [
            'status' => $request->input('status'),
        ];


        Blog::where('id', $id)->update($data);
        return redirect('/admin/blogs');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
