@extends('layouts.app')

@section('content')
<div class="top-bar">
    <h1>Task Management</h1>
    <a href="{{ route('tasks.create') }}" class="btn">+ Create Task</a>
</div>

<form method="GET" action="{{ route('tasks.index') }}" class="section">
    <div class="search-row">
        <div>
            <label>Search</label>
            <input
                type="text"
                name="search"
                placeholder="Search by title, description, or status"
                value="{{ request('search') }}"
            >
        </div>

        <div>
            <label>Filter</label>
            <select name="filter">
                <option value="all" {{ request('filter', 'all') === 'all' ? 'selected' : '' }}>All</option>
                <option value="pending" {{ request('filter') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ request('filter') === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div style="flex: 0 0 auto;">
            <button type="submit" class="btn">Search</button>
        </div>
    </div>
</form>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Subtasks</th>
                <th>Attachments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description ?: '—' }}</td>
                <td>
                    @if($task->is_completed)
                        <span class="badge done">Completed</span>
                    @else
                        <span class="badge pending">Pending</span>
                    @endif
                </td>
                <td>{{ $task->subtasks->count() }}</td>
                <td>{{ $task->attachments->count() }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit</a>

                        <form action="{{ route('tasks.toggleComplete', $task) }}" method="POST" class="inline-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">
                                {{ $task->is_completed ? 'Mark Pending' : 'Mark Completed' }}
                            </button>
                        </form>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No tasks found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 18px;">
    {{ $tasks->links() }}
</div>
@endsection