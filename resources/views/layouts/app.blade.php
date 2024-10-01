<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Name')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .nav-box {
            padding: 10px 15px;
            margin: 5px;
            border: 1px solid #ccc; /* Box border */
            border-radius: 5px; /* Rounded corners */
            background-color: #d3d3d3; /* Light grey background color */
            transition: background-color 0.3s;
        }

        .nav-box:hover {
            background-color: #c0c0c0; /* Slightly darker grey on hover */
        }

        .welcome-message {
            font-weight: bold; /* Bold welcome message */
        }
    </style>
</head>
<body>
    @if (Auth::check())
        <nav class="navbar navbar-expand-lg navbar-light" style="padding: 10px; background-color: transparent;"> <!-- Removed header color -->
            <div class="container d-flex justify-content-between align-items-center">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav"> <!-- Navigation links on the left -->
                        <li class="nav-item">
                            <div class="nav-box">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a> <!-- Home link in a box -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-box">
                                <a class="nav-link" href="{{ route('todos.index') }}">Todos</a> <!-- Todos link in a box -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-box">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Welcome message on the right -->
                <span class="navbar-text welcome-message">
                    Welcome, {{ Auth::user()->name }}!
                </span>
            </div>
        </nav>
    @endif

    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
