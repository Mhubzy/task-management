@extends('layouts.tasks')

@section('title', 'My Tasks')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Add New Task</a>
    </div>

    <ul class="space-y-3">
        @forelse ($tasks as $task)
            <li class="border border-gray-300 rounded p-4">
                <div class="flex justify-between items-start">

                    <div class="">
                        <h2 class="font-semibold text-lg">{{ $task->title }}</h2>
                        <p class="text-gray-600">{{ $task->description }}</p>
                        <p class="text-sm text-gray-500">Due: {{ $task->due_date?->format('d M Y') }}</p>
                    </div>

                    <span class="px-2 py-1 text-sm rounded {{ $task->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                        {{ $task->status }}
                    </span>

                </div>

                <div class="flex items-center gap-2 mt-4">
                    <form method="post" action="{{ route('tasks.updateStatus', $task) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                            {{ $task->status === 'pending' ? 'Mark as Completed' : 'Mark as Pending' }}
                        </button>
                    </form>

                    <a href="{{ route('tasks.show', $task) }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">View Task</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Edit Task</a>

                     <form method="post" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm">Delete Task</button>
                    </form>
                </div>
            </li>
            @empty
            <li>No tasks yet.</li>
        @endforelse
    </ul>
@endsection
