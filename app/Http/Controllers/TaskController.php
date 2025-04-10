<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pendente,em andamento,concluído',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validated);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task, TaskService $service)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:pendente,em andamento,concluído',
            'due_date' => 'nullable|date',
        ]);

        $updatedTask = $service->update($task, $validated);

        return new TaskResource($updatedTask);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, TaskService $service)
    {
        $service->delete($task);

        return response()->json(['message' => 'Task deleted successfully.'], 200);
    }
}
