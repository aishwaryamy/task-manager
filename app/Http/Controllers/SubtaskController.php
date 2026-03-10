<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,completed'],
        ]);

        $task->subtasks()->create($data);
        $task->refresh();
        $task->updateCompletionFromSubtasks();

        return back()->with('success', 'Subtask created.');
    }

    public function update(Request $request, Subtask $subtask)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,completed'],
        ]);

        $subtask->update($data);
        $subtask->task->updateCompletionFromSubtasks();

        return back()->with('success', 'Subtask updated.');
    }

    public function destroy(Subtask $subtask)
    {
        $task = $subtask->task;
        $subtask->delete();
        $task->updateCompletionFromSubtasks();

        return back()->with('success', 'Subtask deleted.');
    }

    public function toggleStatus(Subtask $subtask)
    {
        $subtask->update([
            'status' => $subtask->status === 'pending' ? 'completed' : 'pending',
        ]);

        $subtask->task->updateCompletionFromSubtasks();

        return back()->with('success', 'Subtask status updated.');
    }
}