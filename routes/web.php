<?php

use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('tasks.index'));

Route::resource('tasks', TaskController::class)->except(['show']);

Route::patch('tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])
    ->name('tasks.toggleComplete');

Route::post('tasks/{task}/subtasks', [SubtaskController::class, 'store'])
    ->name('subtasks.store');

Route::put('subtasks/{subtask}', [SubtaskController::class, 'update'])
    ->name('subtasks.update');

Route::delete('subtasks/{subtask}', [SubtaskController::class, 'destroy'])
    ->name('subtasks.destroy');

Route::patch('subtasks/{subtask}/toggle-status', [SubtaskController::class, 'toggleStatus'])
    ->name('subtasks.toggleStatus');