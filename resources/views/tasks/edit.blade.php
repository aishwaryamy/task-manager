@extends('layouts.app')

@section('content')
<div class="top-bar">
    <h1>Edit Task</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Back to Main Page</a>
</div>

<div class="grid">
    <div class="section">
        <h2>Main Task</h2>

        <form method="POST" action="{{ route('tasks.update', $task) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}">

            <label>Description</label>
            <textarea name="description">{{ old('description', $task->description) }}</textarea>

            <label>Add More Attachments</label>
            <input type="file" name="attachments[]" multiple>

            <div class="actions">
                <button type="submit" class="btn">Update Task</button>
            </div>
        </form>
    </div>

    <div class="section">
        <h2>Task Status</h2>

        <p class="muted">
            Current status:
            @if($task->is_completed)
                <span class="badge done">Completed</span>
            @else
                <span class="badge pending">Pending</span>
            @endif
        </p>

        <form action="{{ route('tasks.toggleComplete', $task) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">
                {{ $task->is_completed ? 'Mark Pending' : 'Mark Completed' }}
            </button>
        </form>

        <p class="muted" style="margin-top: 12px;">
            If all subtasks are completed, the main task will automatically be marked completed.
        </p>
    </div>
</div>

<div class="section">
    <h2>Attachments</h2>

    @if($task->attachments->count())
        @foreach($task->attachments as $attachment)
            <div class="attachment-card">
                <strong>{{ $attachment->file_name }}</strong><br>
                <span class="muted">
                    {{ $attachment->file_type ?: 'Unknown type' }}
                    @if($attachment->file_size)
                        | {{ number_format($attachment->file_size / 1024, 2) }} KB
                    @endif
                </span>
                <br><br>
                <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank" class="btn btn-secondary">
                    Open File
                </a>
            </div>
        @endforeach
    @else
        <p class="muted">No attachments uploaded.</p>
    @endif
</div>

<div class="section">
    <h2>Subtasks</h2>

    @if($task->subtasks->count())
        @foreach($task->subtasks as $subtask)
            <div class="subtask-card">
                <form method="POST" action="{{ route('subtasks.update', $subtask) }}">
                    @csrf
                    @method('PUT')

                    <label>Subtask Title</label>
                    <input type="text" name="title" value="{{ $subtask->title }}">

                    <label>Description</label>
                    <input type="text" name="description" value="{{ $subtask->description }}">

                    <label>Status</label>
                    <select name="status">
                        <option value="pending" {{ $subtask->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $subtask->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>

                    <div class="actions">
                        <button type="submit" class="btn">Update</button>
                </form>

                        <form method="POST" action="{{ route('subtasks.toggleStatus', $subtask) }}" class="inline-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Toggle Status</button>
                        </form>

                        <form method="POST" action="{{ route('subtasks.destroy', $subtask) }}" class="inline-form" onsubmit="return confirm('Delete this subtask?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
            </div>
        @endforeach
    @else
        <p class="muted">No subtasks yet.</p>
    @endif
</div>

<div class="section">
    <h2>Add Subtask</h2>

    <form method="POST" action="{{ route('subtasks.store', $task) }}">
        @csrf

        <label>Title</label>
        <input type="text" name="title">

        <label>Description</label>
        <input type="text" name="description">

        <label>Status</label>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>

        <button type="submit" class="btn">Add Subtask</button>
    </form>
</div>
@endsection