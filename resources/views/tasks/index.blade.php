@extends('layouts.app')

@section('content')

<h1>Task Management</h1>

<a href="{{ route('tasks.create') }}">+ Create Task</a>

<br><br>

Filter:
<a href="{{ route('tasks.index', ['filter' => 'all']) }}">All</a> |
<a href="{{ route('tasks.index', ['filter' => 'pending']) }}">Pending</a> |
<a href="{{ route('tasks.index', ['filter' => 'completed']) }}">Completed</a>

<br><br>

<table>
<thead>
<tr>
<th>Title</th>
<th>Description</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

@foreach($tasks as $task)

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

<td>

<a href="{{ route('tasks.edit', $task) }}">Edit</a>

<form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
@csrf
@method('DELETE')
<button type="submit">Delete</button>
</form>

<form action="{{ route('tasks.toggleComplete', $task) }}" method="POST" style="display:inline">
@csrf
@method('PATCH')
<button>
{{ $task->is_completed ? 'Mark Pending' : 'Mark Completed' }}
</button>
</form>

</td>

</tr>

@endforeach

</tbody>
</table>

<br>

{{ $tasks->links() }}

@endsection