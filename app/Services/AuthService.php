<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use Illuminate\Http\Request;

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

    public function register(Request $request): void
    {
        $data = $request->merge([
            'password' => \Hash::make($request->get('password')),
        ]);

        $user = User::create($data->all());
        \Auth::guard()->login($user);
    }

    public function logout(): void
    {
        \Auth::guard()->logout();
        session()->invalidate();
    }

    protected function getUserByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }
}
