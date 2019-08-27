<?php

declare(strict_types=1);

namespace App\Services;

use App\User;

class AuthService
{
    public function attemptLogin(string $email, string $password): bool
    {
        $user = $this->getUserByEmail($email);

        if ($user && \Hash::check($password, $user->password)) {
            \Auth::guard()->login($user);

            return true;
        }

        return false;
    }

    protected function getUserByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }
}
