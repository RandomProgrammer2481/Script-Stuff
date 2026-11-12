<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): bool
    {
        return $user->is_admin || $user->id === $ticket->creator_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        return $user->is_admin || $user->id === $ticket->creator_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        return $user->is_admin || $user->id === $ticket->creator_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ticket $ticket): bool
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('You are not authorized to do this');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ticket $ticket): bool
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('You are not authorized to do this');
    }
}
