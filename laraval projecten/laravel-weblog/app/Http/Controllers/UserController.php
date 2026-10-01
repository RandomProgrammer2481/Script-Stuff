<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $account)
    {
        $sorted_blogs = Blog::where('user_id', $account->id)->get();
        $make_blurb = fn ($text) => $this->makeBlurb($text);
        return view('users.user', compact('sorted_blogs', 'account', 'make_blurb'));
    }

    public function premium()
    {
        return view('users.premium');
    }

    public function set_premium()
    {
        $user = Auth::user();
        $user->update(['is_premium' => true]);

        return redirect()->route('blogs.index');
    }
}
