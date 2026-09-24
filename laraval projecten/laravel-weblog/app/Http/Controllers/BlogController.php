<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        $sorted_blogs = Blog::latest()->get();

        return view('blogs.index', compact('sorted_blogs'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category');
        $blog->body = $request->input('body');
        $blog->is_premium = ($request->input('premium') === "premium") ? true : false ;
        // Replace with proper user_id later
        $blog->user_id = 5;
        $blog->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->get();
        

        $find_user_name = function ($user_id) {
            return User::find($user_id)->name;
        };

        return view('blogs.blog', compact('blog', 'comments', 'find_user_name'));
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
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('items.index');
    }
}
