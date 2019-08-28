<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function index(): View
    {
        return \View::make('auth.register');
    }

    public function register(RegistrationRequest $request): RedirectResponse
    {
        $this->authService->register($request);

        return \Redirect::to(route('home'));
    }
}
