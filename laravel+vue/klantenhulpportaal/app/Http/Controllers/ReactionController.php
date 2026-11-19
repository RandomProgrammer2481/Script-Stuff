<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionResource;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Builder;


class ReactionController extends Controller
{
    public function index(int $ticket_id){

        $reactions = Reaction::query()
            ->when($ticket_id, function (Builder $q, int $ticket_id) {
                $q->where('ticket_id', $ticket_id);
                })
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return ReactionResource::collection($reactions);
    }
}
