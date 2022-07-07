<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Auth;
 
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::select('id', 'name', 'created_at', 'updated_at')->where('user_id', Auth::user()->id)->get();
 
        return view('tasks.index', compact('tasks'));
    }
 
    public function create()
    {
        $this->authorize('manage tasks');
 
        return view('tasks.create');
    }
 
    public function store(StoreTaskRequest $request)
    {
        $this->authorize('manage tasks');
 
        // Task::create([
        //     'name' => $request->name,
        //     'user_id' => Auth::user()->id,
        // ]);

        $task = new Task;
        $task->name = $request->name;
        $task->user_id = Auth::user()->id;
        $task->save();
 
        return redirect()->route('tasks.index');
    }
 
    public function edit(Task $task)
    {
        $this->authorize('manage tasks');
 
        return view('tasks.edit', compact('task'));
    }
 
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('manage tasks');
 
        $task->update($request->validated());
 
        return redirect()->route('tasks.index');
    }
 
    public function destroy(Task $task)
    {
        $this->authorize('manage tasks');
 
        $task->delete();
 
        return redirect()->route('tasks.index');
    }
}