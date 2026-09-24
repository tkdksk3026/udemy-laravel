<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function store(Request $request){
        $task = $request->input('task') ;
        $result = Task::create([
            'task' => $task
        ]);
     return $result->id . '番目のタスクを追加しました';
    }
}

