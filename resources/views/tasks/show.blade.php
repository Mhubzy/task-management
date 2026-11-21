@extends('layouts.app')

@section('title', "Show Task Details")

@section('content')
    <h1 class="text-2xl font-bold mb-4">Task Details</h1>

    <div class="border border-gray-300 rounded p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="font-semibold text-xl">{{$task->title}}</h2>
            <span class="px-2 py-1 text-sm rounded {{ $task->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                {{ $task->status }}
            </span>
        </div>

        <p class="text-gray-600 mb-4">{{$task->description ?? 'No description' }}</p>
        <p class="text-sm text-gray-500">Due: {{$task->due_date?->format('d-m-Y') ?? 'No due date'}}</p>
    </div>

    <div class="flex items-center gap-4 mt-4">
        <a href="{{ route('tasks.edit', $task) }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Edit Task</a>
        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline text-sm">Back to all tasks</a>
    </div>

@endsection
