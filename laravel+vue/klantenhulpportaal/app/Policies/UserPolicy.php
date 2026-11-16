<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('You are not authorized for this action');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): Response
    {
        return $user->is_admin || $user === $model
            ? Response::allow()
            : Response::deny('You are not authorized for this action');
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
    public function update(User $user, User $model): Response
    {
        return $user->is_admin || $user === $model
            ? Response::allow()
            : Response::deny('You are not authorized for this action');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        return $user->is_admin || $user === $model
            ? Response::allow()
            : Response::deny('You are not authorized for this action');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('You are not authorized for this action');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('You are not authorized for this action');
    }
}
