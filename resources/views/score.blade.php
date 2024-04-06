<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Results</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 100%;
        width: 100%;
    }

    .chart-container {
        width: 66.6%;
    }

    .options {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .options h3 {
        margin-bottom: 10px;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    canvas {
        max-width: 100%;
        max-height: 100%;
    }
</style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container">
        <div class="options">
            <h1>Course Recommendation:</h1>
            <h3>First Option: BS Computer Science</h3>
            <h3>Second Option: BS Computer Engineering</h3>
            <h3>Third Option: BS Electronics Engineering</h3>
            <button>Check Again</button>
        </div>
    <div class="container">
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>

        /* For adding values later from DB. Numbers under data should be replaced with them later
        var value1 = 300;
        var value2 = 200;
        var value3 = 250;
        var value4 = 250;
        */

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Linguistics', 'Mathematics', 'Science', 'Aptitude'],
                datasets: [{
                    label: 'Results',
                    data: [42, 35, 47, 39],
                    backgroundColor: [
                        'rgba(255, 99, 71, 0.6)',   // Red
                        'rgba(0, 191, 255, 0.6)',    // Deep Sky Blue
                        'rgba(255, 215, 0, 0.6)',    // Gold
                        'rgba(60, 179, 113, 0.6)'    // Medium Sea Green
                    ],
                    borderColor: [
                        'rgba(255, 99, 71, 1)',   // Red
                        'rgba(0, 191, 255, 1)',    // Deep Sky Blue
                        'rgba(255, 215, 0, 1)',    // Gold
                        'rgba(60, 179, 113, 1)'    // Medium Sea Green
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right', // Display legend on the right side
                        align: 'start' // Align legend to the start of the container
                    }
                },
                layout: {
                    padding: {
                        left: 75, // Add padding to the left of the chart
                        right: 75, // Add padding to the right of the chart
                    }
                },
                elements: {
                    arc: {
                        borderWidth: 0 // Hide the border of the pie chart segments
                    }
                },
                radius: '100%', // Increase the size of the pie chart
            }
        });
    </script>
</body>
</html>
