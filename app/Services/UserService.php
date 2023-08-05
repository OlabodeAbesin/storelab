<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Create a new Api User
     */
    public function store(array $userData): User
    {
        $user = User::create($userData);

        return $user;
    }

    /**
     * Get authenticated user
     */
    public function show(User $user): User
    {
        return $user;
    }

    /**
     * Refresh the user's access token
     */
    public function refreshToken(User $user): User
    {
        $user->tokens()->delete();
        $user->roles()->sync($userData['roles']);

        return $user;
    }
}
