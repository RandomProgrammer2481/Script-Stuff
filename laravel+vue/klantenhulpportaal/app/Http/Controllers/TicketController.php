<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
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

    public function store(StoreTicketRequest $request){
        $validated = $request->safe();

        $arguments = array_merge($validated->except('categories'), [
            'creator_id' => $request->user()->id,
            'assignee_id' => null,
            'status_id' => 1,
        ]);
        $ticket = Ticket::create($arguments);
        $ticket->categories()->sync($validated->only('categories')['categories']);

    }

    public function update(UpdateTicketRequest $request, Ticket $ticket){
        if ($request->user()->cannot('update', $ticket)) {
            abort(403);
        }

        $validated = $request->safe();

        $ticket->update($validated->except('categories'));

        if ($validated->has('categories')) {
            $ticket->categories()->sync($validated->input('categories'));
        }

        return new TicketResource($ticket->fresh(['categories', 'assignee', 'status']));
    }

    public function assign(Request $request, Ticket $ticket){

        $ticket->update(['assignee_id' => $request['id']]);

        return new TicketResource($ticket->fresh(['assignee']));
    }

    public function show(Request $request, Ticket $ticket) {
        if ($request->user()->cannot('view', $ticket)) {
            abort(403);
        }

        return new TicketResource($ticket);
    }
}