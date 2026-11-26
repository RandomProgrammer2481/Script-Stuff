<?php

namespace App\Policies;

use App\Models\Reaction;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReactionPolicy
{
    /**
     * Admin Fall through for the policy
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
    public function view(User $user, Reaction $reaction): Response
    {
        return $user->id === $reaction->user_id
            ? Response::allow()
            : Response::deny('You are not authorized');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return Response::deny('You are not authorized');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Reaction $reaction): Response
    {
        return Response::deny('You are not authorized');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Reaction $reaction): Response
    {
        return Response::deny('You are not authorized');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Reaction $reaction): Response
    {
        return Response::deny('You are not authorized');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Reaction $reaction): Response
    {
        return Response::deny('You are not authorized');
    }
}
