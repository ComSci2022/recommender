@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Taker Scores</h1>
        <table class="table">
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($takerScores as $takerScore)
                    <tr>
                        <td>{{ $takerScore->taker_id }}</td>
                        <td>{{ $takerScore->lname }}</td>
                        <td>{{ $takerScore->fname }}</td>
                        <td>{{ $takerScore->mid_ini }}</td>
                        <td>{{ $takerScore->linguistics }}</td>
                        <td>{{ $takerScore->mathematics }}</td>
                        <td>{{ $takerScore->science }}</td>
                        <td>{{ $takerScore->aptitude }}</td>
                        <td>{{ $takerScore->total_score }}</td>
                        <td>
                            <a href="{{ route('takerscores.edit', ['takerScore' => $takerScore->taker_id]) }}"><button type="submit">Edit</button></a>
                            <form action="{{ route('takerscores.destroy', ['takerScoreId' => $takerScore->taker_id]) }}" method="POST">
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
@endsection
