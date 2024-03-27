<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="header">
        <h2>Record</h2>
    </div>
    <div class="content">
        <form action="{{ route('record.store') }}" method="post">
            @csrf
            <div class="input-group">
                <label for="name">Taker ID:</label>
                <input type="text" id="name" name="name" placeholder="Enter Taker ID" required>
            </div>
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" required>
            </div>
            <div class="input-group">
                <label for="linguistics">Linguistics Score:</label>
                <input type="number" id="linguistics" name="linguistics" placeholder="Enter Linguistics Score" oninput="calculateTotal()" required>
            </div>
            <div class="input-group">
                <label for="mathematics">Mathematics Score:</label>
                <input type="number" id="mathematics" name="mathematics" placeholder="Enter Mathematics Score" oninput="calculateTotal()" required>
            </div>
            <div class="input-group">
                <label for="science">Science Score:</label>
                <input type="number" id="science" name="science" placeholder="Enter Science Score" oninput="calculateTotal()" required>
            </div>
            <div class="input-group">
                <label for="aptitude">Aptitude Score:</label>
                <input type="number" id="aptitude" name="aptitude" placeholder="Enter Aptitude Score" oninput="calculateTotal()" required>
            </div>
            <div class="input-group">
                <label for="total_score">Total Score:</label>
                <input type="text" id="total_score" name="total_score" placeholder="Total Score" readonly>
            </div>
            <button type="submit" class="record-btn">Record</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function calculateTotal() {
            var linguistics = parseInt(document.getElementById('linguistics').value) || 0;
            var mathematics = parseInt(document.getElementById('mathematics').value) || 0;
            var science = parseInt(document.getElementById('science').value) || 0;
            var aptitude = parseInt(document.getElementById('aptitude').value) || 0;
            var totalScore = linguistics + mathematics + science + aptitude;
            document.getElementById('total_score').value = totalScore;
        }

        document.getElementById('linguistics').addEventListener('input', calculateTotal);
        document.getElementById('mathematics').addEventListener('input', calculateTotal);
        document.getElementById('science').addEventListener('input', calculateTotal);
        document.getElementById('aptitude').addEventListener('input', calculateTotal);

    </script>
</body>
</html>
