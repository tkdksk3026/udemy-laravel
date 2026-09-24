<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {

});

Route::get('/tasks/create', function() {
    return view('tasks.create');
});

Route::get('/tasks',[TasksController::class, 'index'] );
Route::post('/tasks/create',[TasksController::class, 'store']);
Route::get('/tasks/{id},edit',[TasksController::class, 'edit'])->name('tasks.edit');
