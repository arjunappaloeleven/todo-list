<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Display all todos (for admin and regular users)
    public function index()
    {
        // Check if the user is an admin
        if (auth()->user()->role === 'admin') {
            $todos = Todo::with('user')->get(); // Admin can see all todos with associated users
        } else {
            // Regular users can only see their own todos
            $todos = Todo::where('user_id', auth()->id())->get();
        }

        return view('todos.index', compact('todos'));
    }

    // Show create form (for users and admin)
    public function create()
    {
        return view('todos.create');
    }

    // Store a new todo (for users and admin)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Todo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Pending', // Default status set to 'Pending'
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    // Show edit form (for users)
    public function edit($id)
    {
        // Admin can edit any todo
        $todo = Todo::findOrFail($id); // Fetch the todo directly for admins
        return view('todos.edit', compact('todo'));
    }

    // Update a todo (for users and admin)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        // Check if the user is an admin or the owner of the todo
        $todo = Todo::findOrFail($id);
        
        // Update the todo
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    // Delete a todo (for users and admin)
    public function destroy($id)
    {
        // Admin can delete any todo
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }

    // Admin: Show edit form for a todo
    public function editAdmin($id)
    {
        // Admin can edit any todo
        $todo = Todo::findOrFail($id);
        return view('admin.todos.edit', compact('todo'));
    }

    // Admin: Update a todo
    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.todos.index')->with('success', 'Todo updated successfully.');
    }

    // Admin: Delete a todo
    public function destroyAdmin($id)
    {
        // Admin can delete any todo
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('admin.todos.index')->with('success', 'Todo deleted successfully.');
    }
}
