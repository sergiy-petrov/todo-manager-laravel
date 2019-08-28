<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Forms\CompleteTaskForm;
use App\Forms\DeleteTaskForm;
use App\Http\Requests\StoreTaskRequest;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    public function index(Request $request, TaskRepository $taskRepository): View
    {
        $userId = \Auth::user()->id;
        $filters = $request->only('search', 'priority', 'date');

        $this->data['tasksAssignedToMe'] = $taskRepository->getAssignedTo($userId, $filters);
        $this->data['tasksCreatedByMe'] = $taskRepository->getCreatedBy($userId, $filters);

        return \View::make('tasks.index', $this->data);
    }

    public function create(FormBuilder $formBuilder): View
    {
        $this->data['form'] = $formBuilder->create(\App\Forms\CreateTaskForm::class, [
            'method' => 'POST',
            'url' => route('tasks.store'),
        ]);

        return \View::make('tasks.create', $this->data);
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $task = Task::create($request->merge([
            'owner_id' => \Auth::user()->id,
        ])->all());

        return \Redirect::to(route('tasks.show', $task));
    }

    public function show(Task $task, FormBuilder $formBuilder): View
    {
        $this->data['task'] = $task;
        $this->data['deleteForm'] = $formBuilder->create(DeleteTaskForm::class, [
            'method' => 'DELETE',
            'url' => route('tasks.destroy', $task),
        ]);
        $this->data['completeForm'] = $formBuilder->create(CompleteTaskForm::class, [
            'method' => 'POST',
            'url' => route('tasks.complete.store', $task),
        ]);

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
        $task->delete();

        return \Redirect::to(route('tasks.index'));
    }
}
