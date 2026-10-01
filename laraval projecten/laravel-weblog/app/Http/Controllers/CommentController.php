<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->blog_id = $blog->id;
        // Replace with proper user_id later
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->route('blogs.show', $blog);
    }
}
