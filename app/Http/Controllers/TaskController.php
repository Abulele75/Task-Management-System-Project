<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\AAUser;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        return view('tasks.create');
         $categories= Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required',
            'status' => 'required',
            'deadline' => 'required|date',
        ]);

        Task::create([

            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('tasks.index');
    }
    public function edit(Task $task) {
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task) {
    $request->validate([
        'title' => 'required|string|max:255',
        'priority' => 'required',
        'status' => 'required',
        'deadline' => 'required|date',
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'status' => $request->status,
        'deadline' => $request->deadline,
    ]);

    return redirect()->route('tasks.index');
}
public function destroy(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index');
}
}
