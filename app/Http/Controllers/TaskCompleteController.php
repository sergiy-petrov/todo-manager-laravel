<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\RedirectResponse;

class TaskCompleteController extends Controller
{
    public function store(Task $task): RedirectResponse
    {
        $task->completed_at = now();
        $task->save();

        return \Redirect::to(route('tasks.show', $task));
    }
}
