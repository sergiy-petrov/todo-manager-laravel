<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->middleware('guest');

        $this->authService = $authService;
    }

    public function index(): View
    {
        return \View::make('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if ($this->authService->attemptLogin($email, $password)) {
            return \Redirect::to(route('home'));
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
