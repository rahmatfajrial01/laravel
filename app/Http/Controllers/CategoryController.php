<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use Termwind\Components\Dd;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Blog::all();
        $categories = Category::latest();

        if (request('search')) {
            $categories->where('title', 'like', '%' . request('search') . '%');
        }


        return view('categories.index',   ['categories' => $categories->paginate(5)->withQueryString()]);
        // return view('categories.index',   ['categories' => Category::all()]);
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


        $data = $request->validate([
            'title' => 'required|min:5|unique:categories',
        ]);

        $data['slug'] = Str::slug($request->input('title'));
        // $data = [
        //     'title' => $request->input('title'),
        //     'slug' => Str::slug($request->input('title')),
        // ];

        Category::create($data);
        return redirect('/categories')->with('success', 'data sussesfully added');
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
    public function edit(string $id)
    {
        return view('categories.edit',  ['category' => Category::where('slug', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
        ];
        // $data = $request->validate([
        //     'title' => 'required|min:5|unique:categories',
        // ]);
        // $data['slug'] = Str::slug($request->input('title'));

        Category::where('slug', $id)->update($data);
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $countEloquent = Blog::where('category_id', $id)->count();

        if ($countEloquent > 0) {
            $message = "Tidak bisa hapus category ini karna masih di gunakan oleh $countEloquent blog";
            return redirect('/categories')->with('message', $message);
        } else {
            Category::where('id', $id)->delete();
            return redirect('/categories');
        }
    }
}
