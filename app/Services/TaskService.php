<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Validation\ValidationException;

class TaskService
{
    public function update(Task $task, array $data): Task
    {
        $okEdit = collect($data)->except('status');

        if ($okEdit->isNotEmpty() && $task->status !== 'pendente') {
            throw ValidationException::withMessages([
                'task' => ['Apenas tarefas pendentes podem ser editadas.']
            ]);
        }

        $task->update($data);

        return $task;
    }

    public function delete(Task $task): void
    {
        if ($task->status !== 'pendente') {
            throw ValidationException::withMessages([
                'task' => ['Apenas tarefas pendentes podem ser deletadas.']
            ]);
        }

        $task->delete();
    }
}
