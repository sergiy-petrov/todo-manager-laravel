<?php

declare(strict_types=1);

namespace App\Services;

use App\User;

class AuthService
{
    public function attemptLogin(string $email, string $password): ?User
    {
        $user = $this->getUserByEmail($email);

        if ($user && \Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    protected function getUserByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }
}
