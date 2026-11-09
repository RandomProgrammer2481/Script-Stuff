<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{ 
    public function index(Request $request){
        $user = $request->user();

        $tickets = Ticket::query()
            ->when(! $user->is_admin, fn ($query) => $query->where('creator_id', $user->id))
            ->orderByDesc('created_at')
            ->orderBy('title')
            ->get();

        return TicketResource::collection($tickets);
    }

}
