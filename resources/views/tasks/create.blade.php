@extends('layouts.app')

@section('content')
<div class="top-bar">
    <h1>Create Task</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Back to Main Page</a>
</div>

<form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data" class="section">
    @csrf

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') }}">

    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <label>Attachments</label>
    <input type="file" name="attachments[]" multiple>

    <button type="submit" class="btn">Save Task</button>
</form>
@endsection