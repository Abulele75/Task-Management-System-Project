<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\AAUser;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied');
        }

        $tasks = Task::all();
        $users = AAUser::all();

        return view('admin.index', compact('tasks', 'users'));
    }


    public function users()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied');
        }

        $users = AAUser::all();

        return view('admin.users', compact('users'));
    }
}

