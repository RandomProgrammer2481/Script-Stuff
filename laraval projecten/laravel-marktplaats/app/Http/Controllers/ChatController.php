<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }

       
        $chats = Chat::where('user_1_id',  Auth::id())
        ->orWhere('user_2_id',  Auth::id())
        ->get();

        return view('chats.index', compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $authId = Auth::id();
        $userId = $user->id;

        $chat = Chat::where(function ($query) use ($userId, $authId) {
                $query->where('user_1_id', $userId)
                    ->where('user_2_id', $authId);
            })
            ->orWhere(function ($query) use ($userId, $authId) {
                $query->where('user_1_id', $authId)
                    ->where('user_2_id', $userId);
            })
            ->first();

        if (!$chat) {
            $chat = Chat::create([
                'user_1_id' => $authId,
                'user_2_id' => $userId,
            ]);
        }

        return redirect()->route('chats.show', $chat);
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
    public function show(Chat $chat)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $messages = Message::where('chat_id', $chat->id)->get();

        return view('chats.show', compact('messages', 'chat'));
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
