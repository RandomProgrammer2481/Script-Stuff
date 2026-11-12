<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionResource;
use App\Models\Reaction;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function index(Ticket $ticket){

        $reactions = Reaction::query()
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return ReactionResource::collection($reactions);
    }
}
