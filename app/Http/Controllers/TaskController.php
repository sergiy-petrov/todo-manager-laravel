<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): View
    {
        return \View::make('tasks.index');
    }

    public function create(): View
    {
        //
    }

    public function store(Request $request): RedirectResponse
    {
        //
    }

    public function show(Task $task): View
    {
        //
    }

    public function edit(Task $task): View
    {
        //
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        //
    }

    public function destroy(Task $task): RedirectResponse
    {
        //
    }
}
