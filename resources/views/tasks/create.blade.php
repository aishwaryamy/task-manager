@extends('layouts.app')

@section('content')

<h1>Create Task</h1>

@if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif

<form method="POST" action="{{ route('tasks.store') }}">

@csrf

<label>Title</label><br>
<input name="title" value="{{ old('title') }}"><br><br>

<label>Description</label><br>
<textarea name="description">{{ old('description') }}</textarea><br><br>

<button type="submit">Save</button>

</form>

@endsection