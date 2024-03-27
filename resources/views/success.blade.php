<!DOCTYPE html>
<html>
<head>
    <title>Record Successful</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="header">
        <h1>Recording Successful!</h1>
    </div>
    <div class="content">
        <p>Choose an option:</p>
        <a href="{{ route('success') }}" class="success-link">Record Again</a>
        <a href="{{ route('login') }}" class="logout-link">Logout</a>
    </div>
</body>
</html>
