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

    public function create(){
        return view('tasks.create');
    }


    public function store(Request $request){
        $validated = $request->validate(Task::$rules , Task::$messagees);
        $result = Task::create($validated);
        session()->flash('success', 'タスクを追加しました');
     return redirect()->route('tasks.index');
    }
    
    public function edit($id){
        $task = Task::findOrFail($id);
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, $id){
        // 該当するレコードを探す
        $task = Task::findOrFail($id);
        // レコードが見つかったら、バリデートを行う
        $validated = $request->validate(Task::$rules, Task::$messagees);

        $task ->update($validated);
        return redirect()->route('tasks.index');
        
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        session()->flash('success', 'タスクを削除しました');

        return redirect()->route('tasks.index');
    }

    public function done($id){

        //該当するレコードを検索
        $task = Task::findOrFail($id);

        // 現在のdoneの状態を取得して、反転します
        $task->done = !$task->done;

        // レコードを更新して
        $task->save();
        // フラッシュメッセージを作る
        session()->flash('success', 'タスクの状態を更新しました');
        //一覧に戻る
        return redirect()->route('tasks.index');
    }
}

