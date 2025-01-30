<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Get users role user
        $users = User::where('role', 'user')->get();

        return view('admin.manage-users.index', compact('users'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Input Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|in:user,admin',
        ]);

        // Create User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('password'),
            'role' => $validated['role'],
        ]);

        return redirect()->route('manage-users.index')->with('success', 'User successfully added.');
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        // Find user by ID
        $user = User::findOrFail($id);

        // Input Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);

        // Update user
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('manage-users.index')->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        // Find user by ID
        $user = User::findOrFail($id);

        // Admin cannot delete themselves
        if ($user->hasRole('admin')) {
            return redirect()->route('manage-users.index')->with('error', 'Admin cannot delete themselves.');
        }

        // Delete user
        $user->delete();

        return redirect()->route('manage-users.index')->with('success', 'User successfully deleted.');
    }
}
