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
        if(Auth::user()->role=== 'admin'){
            $tasks = Task::all();
        } else{
        $tasks = Task::where('user_id', Auth::id())->get();
        }
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        if(Auth::user()->role==='guest'){
        return redirect()->route('tasks.index')
            ->with('error' , 'Guests cannot create tasks');
        }
        
        
         $categories= Category::all();
        $users = AAUser::all();
        return view('tasks.create', compact('categories' , 'users'));
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
        if(Auth::user()->role==='guest'){
            return redirect()->route('task.index')
                ->with('error', 'Guests cannot edit tasks');
                }
        $categories = Category::all();
        return view ('tasks.edit', compact ('task', 'categories'));
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
    if(Auth::user()->role==='guest'){
        return redirect()->route('task.index')
            ->with('error', 'Guests cannot delete tasks');
    }
    $task->delete();
    return redirect()->route('tasks.index');
}
}
