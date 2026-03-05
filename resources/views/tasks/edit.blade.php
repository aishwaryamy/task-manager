@extends('layouts.app')

@section('content')

<h1>Edit Task</h1>

@if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif

<form method="POST" action="{{ route('tasks.update', $task) }}">

@csrf
@method('PUT')

<label>Title</label><br>
<input name="title" value="{{ old('title', $task->title) }}"><br><br>

<label>Description</label><br>
<textarea name="description">{{ old('description', $task->description) }}</textarea><br><br>

<button type="submit">Update</button>

</form>

@endsection