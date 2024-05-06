@extends('layouts.app')

@section('content')
<style>
    /* Custom styles for the tasks page */
    .card-header {
        background-color: #7DB58D; /* Primary color */
        color: #fff; /* Text color */
    }

    .btn-secondary {
        background-color: #A07C7C; /* Secondary color */
        border-color: #A07C7C; /* Secondary color */
    }

    .btn-secondary:hover {
        background-color: #65756A; /* Tertiary color */
        border-color: #65756A; /* Tertiary color */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>
                                        <!-- Delete button -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" method="POST" class="btn btn-secondary">Edit Task</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No tasks found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $tasks->links() }}

                    <!-- Button to redirect back to the welcome page -->
                    <a href="{{ route('welcome') }}" class="btn btn-secondary">Back to adding Tasks </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection