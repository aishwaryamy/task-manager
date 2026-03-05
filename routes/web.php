<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Redirect homepage to task manager
Route::get('/', fn () => redirect()->route('tasks.index'));

Route::resource('tasks', TaskController::class)->except(['show']);

Route::patch('tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])
    ->name('tasks.toggleComplete');