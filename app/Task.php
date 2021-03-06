<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'assignee_id',
        'owner_id',
        'priority',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getIsCompletedAttribute(): bool
    {
        return ! \is_null($this->completed_at);
    }

    public function getOwnerNameAndEmailAttribute(): string
    {
        return "{$this->owner->name} ({$this->owner->email})";
    }

    public function getAssigneeNameAndEmailAttribute(): string
    {
        if ($this->assignee->exists) {
            return "{$this->assignee->name} ({$this->assignee->email})";
        }

        return '';
    }
}
