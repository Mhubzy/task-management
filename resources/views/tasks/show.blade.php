@extends('layouts.app')

@section('title', "Show Task Details")

@section('content')
    <h1>Task Details</h1>
    <p>Title: {{$task->title}}</p>
    <p>Description: {{$task->description ?? 'No description' }}</p>
    <p>Due date: {{$task->due_date?->format('d-m-Y') ?? 'No due date'}}</p>
    <p>Status: {{ $task->status }}</p>

    <a href="{{ route('tasks.index') }}">Back to all Tasks</a>
@endsection
