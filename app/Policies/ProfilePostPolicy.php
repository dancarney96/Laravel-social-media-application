<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePostPolicy
{
    use HandlesAuthorization;

    public function create(User $currentUser, User $postUser)
    {
        return $currentUser->id === $postUser->id;
    }
}
