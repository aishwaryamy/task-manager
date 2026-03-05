<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tasks</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; }
        .row { display:flex; gap:10px; align-items:center; }
        .badge { padding: 2px 8px; border-radius: 12px; font-size: 12px; }
        .done { background: #d1fae5; }
        .pending { background: #fee2e2; }
        table { width:100%; border-collapse: collapse; margin-top: 16px; }
        td, th { border: 1px solid #ddd; padding: 10px; vertical-align: top; }
        .actions form { display:inline; margin-left: 6px; }
        .top { display:flex; justify-content: space-between; align-items:center; }
        .msg { padding: 10px; background: #f0f9ff; border: 1px solid #bae6fd; margin: 10px 0; }
        a { text-decoration: none; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <div class="top">
        <h1>Task Management</h1>
        <a href="{{ route('tasks.create') }}">+ Create Task</a>
    </div>

    @if(session('success'))
        <div class="msg">{{ session('success') }}</div>
    @endif

    <div class="row">
        <strong>Filter:</strong>
        <a href="{{ route('tasks.index', ['filter' => 'all']) }}">All</a> |
        <a href="{{ route('tasks.index', ['filter' => 'pending']) }}">Pending</a> |
        <a href="{{ route('tasks.index', ['filter' => 'completed']) }}">Completed</a>
        <span style="margin-left:10px; color:#666;">(current: {{ $filter }})</span>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 25%;">Title</th>
                <th>Description</th>
                <th style="width: 15%;">Status</th>
                <th style="width: 25%;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    @if($task->is_completed)
                        <span class="badge done">Completed</span>
                    @else
                        <span class="badge pending">Pending</span>
                    @endif
                </td>
                <td class="actions">
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>

                    <form action="{{ route('tasks.toggleComplete', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            {{ $task->is_completed ? 'Mark Pending' : 'Mark Completed' }}
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No tasks yet.</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top: 14px;">
        {{ $tasks->links() }}
    </div>
</body>
</html>