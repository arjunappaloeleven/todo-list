{{-- resources/views/todos/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <style>
        /* Add background image for the content area */
        body {
            background: url("{{ asset('images/new-todo-bg.jpg') }}") no-repeat center center fixed; /* Use the new image */
            background-size: cover; /* Ensure the background covers the entire area */
        }

        .add-todo-content {
            background-color: rgba(255, 255, 255, 0.9); /* White background with transparency */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px; /* Optional: Limit the width of the form */
            margin: auto; /* Center the form */
            margin-top: 50px; /* Space from the top */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

    <div class="container add-todo-content">
        <h1>Add New Todo</h1>

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Todo</button>
        </form>
    </div>
@endsection
