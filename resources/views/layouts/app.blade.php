<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taker Details</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar-nav {
            display: flex;
            gap: 10px;
        }

        .nav-item {
            list-style-type: none;
        }

        .nav-link {
            text-decoration: none;
            color: white;
        }

        .nav-link.btn {
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #007bff;
            border: none;
        }

        .nav-link.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn" href="{{ route('takerscores.index') }}">Taker Scores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn" href="{{ route('takerscores.create') }}">Add New Taker</a>
                </li>
                <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn">Logout</button>
                </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
