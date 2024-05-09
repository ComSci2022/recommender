<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <div class="content">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="user">User:</label>
            <input type="text" id="user" name="user" placeholder="Enter User" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <br>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>