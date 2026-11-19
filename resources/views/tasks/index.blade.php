@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <h1>All Tasks</h1>
     <ul>
        @forelse ($tasks as $task)
            <li>
                {{  $task->title }} -
                {{  $task->description  }} -
                {{  $task->due_date?->format('d M Y') }} -
                {{  $task->status  }} -
                <form method="post" action="{{ route('tasks.updateStatus', $task) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        {{ $task->status === 'pending' ? 'Mark as Completed' : 'Mark as Pending' }}
                    </button>
                </form>
                <a href="{{ route('tasks.show', $task) }}">View Task</a>
                <a href="{{ route('tasks.edit', $task) }}">Edit Task</a>
                <form method="post" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('DELETE')
                <button type="submit">Delete Task</button>
                </form>
            </li>
            @empty
            <li>No tasks yet.</li>
        @endforelse
        {{-- {{ $tasks->links() }} --}}
        {{-- <p>Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }} tasks</p> --}}
    </ul>
@endsection
