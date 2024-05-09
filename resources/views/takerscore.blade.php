<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taker Scores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="header">
        <h2>Taker Scores</h2>
    </div>
    <div class="content">
        <table style="width: 100vw; background-color: transparent !important;">
            <thead>
                <tr>
                    <th>Taker ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Initial</th>
                    <th>Linguistics</th>
                    <th>Mathematics</th>
                    <th>Science</th>
                    <th>Aptitude</th>
                    <th>Total Score</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($takerScores as $takerScore)
                <tr>
                    <td>{{ $takerScore->taker_id }}</td>
                    <td>{{ $takerScore->lname }}</td>
                    <td>{{ $takerScore->fname }}</td>
                    <td>{{ $takerScore->mid_ini }}</td>
                    <td>{{ $takerScore->linguistics }}</td>
                    <td>{{ $takerScore->mathematics }}</td>
                    <td>{{ $takerScore->science }}</td>
                    <td>{{ $takerScore->aptitude }}</td>
                    <td>{{ $takerScore->totalscore }}</td>
                    <td>
                        <form method="GET" action="{{ route('takerscores.edit', $takerScore->id) }}">
                            @csrf
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('takerscores.destroy', $takerScore->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
