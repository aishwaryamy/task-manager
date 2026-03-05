<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Task</title></head>
<body style="font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto;">
    <h1>Edit Task</h1>

    @if($errors->any())
        <div style="padding:10px; background:#ffe4e6; border:1px solid #fecdd3;">
            <ul>
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label>Title</label><br>
            <input name="title" value="{{ old('title', $task->title) }}" style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Description</label><br>
            <textarea name="description" style="width:100%; padding:8px;" rows="4">{{ old('description', $task->description) }}</textarea>
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
    </form>
</body>
</html>