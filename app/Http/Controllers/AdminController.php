<?php

namespace App\Http\Controllers;

use App\Models\User; // Import User model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        // You can pass any relevant data to the view
        return view('admin.dashboard');
    }

    // List all users
    public function indexUsers()
    {
        $users = User::all(); // Retrieve all users from the database
        return view('admin.users.index', compact('users'));
    }

    // Show form for creating a new user
    public function createUser()
    {
        return view('admin.users.create'); // Return view for creating a new user
    }

    // Store a new user
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'role' => 'user', // Default role
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Show form for editing a user
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user
    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    // Manage todos (Placeholder for future implementation)
    public function manageTodos()
    {
        // Logic for managing todos
        return view('admin.todos.index'); // Return view for managing todos
    }
}
