@extends('layouts.tasks')

@section('title', "Edit Task")

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Title: </label>
            <input type="text" id="title" name="title" value="{{   old('title', $task->title)  }}" class="w-full border border-gray-300 rounded px-3 py-2">
            @error('title')
                <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Description: </label>
            <textarea name="description" id="description" class="w-full border border-gray-300 rounded px-3 py-2">{{   old('description', $task->description)  }}</textarea>
            @error('description')
                <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="block font-medium mb-1">Due date: </label>
            <input type="date" id="due_date" name="due_date" value="{{   old('due_date', $task->due_date?->format('Y-m-d'))  }}" class="w-full border border-gray-300 rounded px-3 py-2">
            @error('due_date')
                <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Task</button>
    </form>

@endsection
