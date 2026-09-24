<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
        public function index(){
            $tasks = Task::all();
            return view('tasks.index', [
                'tasks' => $tasks
            ]);
        }

    public function store(Request $request){
        $validated = $request->validate(Task::$rules , Task::$messagees);
        $result = Task::create($validated);

     return $result->id . '番目のタスクを追加しました';
    }
    
    public function edit($id){
        $task = Task::findOrFail($id);
        return view('tasks.edit', [
            'task' => $task
        ]);
    }
}

