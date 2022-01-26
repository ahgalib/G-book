<?php

namespace App\Policies;

use App\Models\User;
use App\Models\aboutMe;
use Illuminate\Auth\Access\HandlesAuthorization;

class aboutMePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function aboutUpdate(User $user,aboutMe $aboutMe)
    {
        return $user->id == $aboutMe->user_id;
    }
}
