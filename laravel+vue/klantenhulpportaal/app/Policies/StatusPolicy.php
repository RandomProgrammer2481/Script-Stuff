<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StatusPolicy
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
        return Response::deny();
    }

}
