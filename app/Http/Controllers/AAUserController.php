<?php

namespace App\Http\Controllers;

use App\Models\AAUser;
use Illuminate\Http\Request;

class AAUserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = AAUser::all();
        return view('users.index', compact('users'));
    }

    // Show single user
    public function show($id)
    {
        $user = AAUser::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Update user role
    public function updateRole(Request $request, $id)
    {
        $user = AAUser::findOrFail($id);

        $request->validate([
            'role' => 'required|in:admin,organizer,attendee',
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()
                         ->with('success', 'User role updated successfully.');
    }
}