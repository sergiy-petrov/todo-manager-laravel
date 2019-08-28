<?php

declare(strict_types=1);

namespace App\Policies;

use App\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function view(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return true;
    }

    public function delete(User $user, Task $task): bool
    {
        return $user->id === $task->owner_id;
    }

    public function complete(User $user, Task $task): bool
    {
        if ($user->id === $task->owner_id) {
            return true;
        }

        return $user->id !== $task->assignee_id;
    }
}
