<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function getAssignedTo(int $userId, array $filters = []): Collection
    {
        $builder = Task::with('assignee', 'owner')
            ->whereAssigneeId($userId)
            ->orderByDesc('priority');

        $this->applyFilters($builder, $filters);

        return $builder->get();
    }

    public function getCreatedBy(int $userId, array $filters = []): Collection
    {
        $builder = Task::with('assignee', 'owner')
            ->whereOwnerId($userId)
            ->orderByDesc('priority');

        $this->applyFilters($builder, $filters);

        return $builder->get();
    }

    protected function applyFilters(Builder $builder, array $filters = []): void
    {
        $search = $filters['search'] ?? null;
        $date = $filters['date'] ?? null;
        $priority = $filters['priority'] ?? null;

        if (isset($search)) {
            $builder->where('title', 'like', "%{$search}%");
        }

        if (isset($date)) {
            $builder->whereDate('completed_at', $date);
        }

        if (isset($priority)) {
            $builder->where('priority', $priority);
        }
    }
}
