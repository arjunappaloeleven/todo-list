@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/home-bg.jpg') }}'); /* Background image */
        background-size: cover;
        background-position: center;
        color: #ffffff; /* Set text color to white */
        font-family: 'Arial', sans-serif;
    }

    .container {
        margin-top: 100px; /* Space from the top */
    }

    .welcome-message {
        text-align: center;
        margin-bottom: 50px;
    }

    h1 {
        font-size: 3rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .card {
        background-color: rgba(255, 255, 255, 0.5); /* Less bright, more transparent white background */
        border: none;
        border-radius: 15px;
        padding: 20px;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05); /* Zoom effect on hover */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 20px; /* Rounded buttons */
        padding: 10px 20px;
        font-size: 1.2rem;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: translateY(-2px); /* Lift effect on hover */
    }

    .card-title {
        font-size: 2rem;
        color: 	#505050; /* Golden color for title */
        text-align: center;
        margin-bottom: 20px;
    }

    .card-text {
        font-size: 1.2rem;
        color: #000000; /* Change text color to black for better visibility */
    }

    .card-link {
        color: #ffcc00; /* Link color */
    }

    .card-link:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <div class="welcome-message">
        <h1>Welcome to Your To-Do List!</h1>
        <p>Manage your tasks efficiently and effectively.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Create Todo</h5>
                    <p class="card-text">Start managing your tasks by adding a new todo item.</p>
                    <a href="{{ route('todos.create') }}" class="btn btn-primary">Add Todo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">View Your Todos</h5>
                    <p class="card-text">See all your current tasks and their statuses.</p>
                    <a href="{{ route('todos.index') }}" class="btn btn-primary">View Todos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
