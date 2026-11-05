<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{ 
    public function index(){
        $tickets = Ticket::query()->orderByDesc('created_at')->orderBy('title')->get();

        return TicketResource::collection($tickets);
    }

}
