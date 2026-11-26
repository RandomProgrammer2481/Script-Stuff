<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Admin fall through for the policy
     */
    public function before(User $user): Response|null
    {
        return  $user->is_admin
        ? Response::allow() 
        : null ;
    }


    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): Response
    {
        return $user->id === $ticket->creator_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): Response
    {
        return $user->id === $ticket->creator_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }


    /**
     * Determine whether the user can assign and admin to the the model.
     */
    public function assignAdmin(): Response
    {
        return Response::deny();
    }


    /**
     * Determine whether the user can change the status on the model
     */
    public function updateStatus(): Response
    {
        return Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): Response
    {
        return $user->id === $ticket->creator_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ticket $ticket): Response
    {
        return Response::deny('You are not authorized to do this');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ticket $ticket): Response
    {
        return Response::deny('You are not authorized to do this');
    }
}
