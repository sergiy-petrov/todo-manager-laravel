<?php

declare(strict_types=1);

namespace App\Http\Requests;


class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required',
            'assignee_id' => 'nullable|exists:users,id',
            'priority' => 'required|integer|max:5',
        ];
    }
}
