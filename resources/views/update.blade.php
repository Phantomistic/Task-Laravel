<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
</head>
<body>
    <h1>Update Task</h1>
    
    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $task->title }}"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ $task->description }}</textarea><br><br>

        <label for="due_date">Due Date:</label><br>
        <input type="date" id="due_date" name="due_date" value="{{ $task->due_date }}"><br><br>

        
        <a href="{{ route('welcome') }}" class="btn btn-secondary"><button type="submit">Update Task</button></a>
    </form>
</body>
</html>