<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $make_blurb = fn ($text) => $this->makeBlurb($text);

        $categories = Category::all();

        if ($request->category != ""){
            $ordered_blogs = Blog::where('category_id', $request->category)->latest()->get();
        } else {
            $ordered_blogs = Blog::latest()->get();
        }
        return view('blogs.index', compact('ordered_blogs', 'make_blurb', 'categories'));
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
        $blog->user_id = Auth::user()->id;

        $request->validate(['img' => ['required', 'image']]);
 
        $path = $request->image('img')
            ->cover(400, 400)
            ->toWebp()
            ->storePublicly('images', 'public');
        
        $blog->img_path = $path;
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
    public function edit(Blog $blog)
    {
        $categories = Category::all();

        if (Auth::user() && Auth::user()->id === $blog->user_id) {
            return view('blogs.edit', compact('blog', 'categories'));
        } else {
            return view('errors.403');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category');
        $blog->body = $request->input('body');
        $blog->is_premium = ($request->input('premium') === "premium") ? true : false ;
        $blog->user_id = Auth::user()->id;
        $request->validate(['img' => ['required', 'image']]);
 
        $path = $request->image('img')
            ->cover(400, 400)
            ->toWebp()
            ->storePublicly('images', 'public');
        
        $blog->img_path = $path;

        $blog->save();

        return redirect()->route('blogs.show', $blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('users.user', Auth::user());
    }
}
