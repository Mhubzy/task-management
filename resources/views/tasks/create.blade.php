@extends('layouts.app')

@section('title', 'Add New Task')

@section('content')
    <h1>Add Tasks</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <label for="title" class="block font-medium mb-1">Title: </label>
        <input type="text" id="title" name="title" value="{{   old('title')  }}" class="w-full border border-gray-300 rounded px-3 py-2">
        @error('title')
            <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
        @enderror

        <label for="description" class="block font-medium mb-1">Description: </label>
        <textarea name="description" id="description" value="{{   old('description')  }}" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
        @error('description')
            <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
        @enderror

        <label for="due_date" class="block font-medium mb-1">Due date: </label>
        <input type="date" id="due_date" name="due_date" value="{{   old('due_date')  }}" class="w-full border border-gray-300 rounded px-3 py-2">
        @error('due_date')
            <div class="text-red-600 text-sm mt-1">{{ $message  }}</div>
        @enderror

        <button type="submit">Add Task</button>
    </form>

@endsection
