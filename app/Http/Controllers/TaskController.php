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
        $userId = \Auth::user()->id;

        $this->data['tasksAssignedToMe'] = Task::with('assignee', 'owner')
            ->whereAssigneeId($userId)
            ->orderByDesc('priority')
            ->get();

        $this->data['tasksCreatedByMe'] = Task::with('assignee', 'owner')
            ->whereOwnerId($userId)
            ->orderByDesc('priority')
            ->get();

        return \View::make('tasks.index', $this->data);
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
        $this->data['task'] = $task;

        return \View::make('tasks.show', $this->data);
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
