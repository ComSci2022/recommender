<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Results</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="header">
        <h2>Check Results</h2>
    </div>
    <div class="content">
        <p>Enter the following details to check the results:</p>
        <form action="#" method="post">
            <div class="input-group">
                <label for="taker_id">Taker ID:</label>
                <input type="text" id="taker_id" name="taker_id" placeholder="Enter Taker ID" required>
            </div>
            <div class="input-group">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name" placeholder="Enter Student Name" required>
            </div>
            <button type="submit" class="check-result-btn">Check Result</button>
        </form>
    </div>
</body>
</html>
