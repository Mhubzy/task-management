@extends('layouts.tasks')

@section('title', 'Add New Task')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Title: </label>
            <input type="text" id="title" name="title" value="{{   old('title')  }}" class="w-full border border-gray-300 rounded px-3 py-2">
            @error('title')
                <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Description: </label>
            <textarea name="description" id="description" class="w-full border border-gray-300 rounded px-3 py-2">{{   old('description')  }}</textarea>
            @error('description')
                <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="block font-medium mb-1">Due date: </label>
            <input type="date" id="due_date" name="due_date" value="{{   old('due_date')  }}" class="w-full border border-gray-300 rounded px-3 py-2">
            @error('due_date')
                <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
            @enderror
        </div>

        <div class="flex justify-between items-center mb-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Task</button>
            <a href="{{ route('tasks.index') }}" class="border border-gray-300 text-gray-700 px-4 py-2 rounded text-sm">Back To Task</a>
        </div>
    </form>

@endsection
