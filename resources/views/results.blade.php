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
        <form id="resultsForm" action="{{ route('takerscores.recommendCourse') }}" method="post">
            @csrf
            <div class="input-group">
                <label for="taker_id">Taker ID:</label>
                <input type="text" id="taker_id" name="taker_id" placeholder="Enter Taker ID" required>
            </div>
            <div class="input-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" placeholder="Enter Last Name" required>
            </div>
            <button type="button" onclick="submitForm()">Check Result</button>
        </form>
    </div>

    <script>
        function submitForm() {
            var form = document.getElementById('resultsForm');
            form.submit();
        }
    </script>
</body>
</html>
