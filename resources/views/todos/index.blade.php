{{-- resources/views/todos/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <style>
        /* Add background image for the content area */
        body {
            background: url("{{ asset('images/todo-bg.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }

        .todo-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .todo-item {
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f9fa;
            transition: background-color 0.3s;
            display: flex; /* Added to arrange items in a row */
            justify-content: space-between; /* Space between the left and right */
            align-items: center; /* Center vertically */
        }

        .todo-item:hover {
            background-color: #e9ecef;
        }
    </style>

    <div class="container todo-container">
        <h1>Your Todos</h1>

        <a href="{{ route('todos.create') }}" class="btn btn-success mb-3">Add New Todo</a>

        @foreach ($todos as $todo)
            <div class="todo-item">
                <div>
                    <h5>{{ $todo->title }}</h5>
                    <p>{{ $todo->description }}</p>
                    <span>Status: {{ $todo->status }}</span>
                </div>
                <div>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
