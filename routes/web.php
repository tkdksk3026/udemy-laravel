<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {

});

Route::get('/tasks',[TasksController::class, 'index'] )->name('tasks.index');
Route::get('/tasks/create',[TasksController::class, 'create'])->name('tasks.create');
Route::post('/tasks/create',[TasksController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit',[TasksController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/{id}/edit',[TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}/delete',[TasksController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{id}/done',[TasksController::class, 'done'])->name('tasks.done');