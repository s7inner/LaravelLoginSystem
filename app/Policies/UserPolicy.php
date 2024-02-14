<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public static function viewIsAdmin(User $user): bool
    {
        return $user->is_admin; // If is_admin == true, the owner is the administrator
    }
}
