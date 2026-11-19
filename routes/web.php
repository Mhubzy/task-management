<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('welcome');
});
//Route for all seven CRUD operations for the Task model
Route::resource('tasks', TaskController::class);
//Route to mark a task as completed or pending
Route::patch('tasks/{task}/status', [TaskController::class, 'toggleStatus'])->name('tasks.updateStatus');
