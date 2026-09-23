<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

});

Route::get('/tasks/create', function() {
    return view('tasks.create');
});

Route::post('/tasks/create',function(){
    $task = request('task');
    return  $task . 'が送信されました';
});