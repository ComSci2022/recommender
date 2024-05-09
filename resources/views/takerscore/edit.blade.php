@extends('layouts.app')

@section('title')
Edit A Taker Score
@endsection

@section('content')
    <h1>Taker Score Form</h1>
    <form action="{{ route('takerscores.update', $takerScore->taker_id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="taker_id" class="form-label">Taker ID:</label>
            <input type="text" name="taker_id" class="form-control" value="{{ $takerScore->taker_id }}">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name:</label>
            <input type="text" name="lname" class="form-control" value="{{ $takerScore->lname }}">
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" name="fname" class="form-control" value="{{ $takerScore->fname }}">
        </div>
        <div class="mb-3">
            <label for="mid_ini" class="form-label">Middle Initial:</label>
            <input type="text" name="mid_ini" class="form-control" value="{{ $takerScore->mid_ini }}">
        </div>
        <div class="mb-3">
            <label for="linguistics" class="form-label">Linguistics:</label>
            <input type="text" name="linguistics" class="form-control" value="{{ $takerScore->linguistics }}">
        </div>
        <div class="mb-3">
            <label for="mathematics" class="form-label">Mathematics:</label>
            <input type="text" name="mathematics" class="form-control" value="{{ $takerScore->mathematics }}">
        </div>
        <div class="mb-3">
            <label for="science" class="form-label">Science:</label>
            <input type="text" name="science" class="form-control" value="{{ $takerScore->science }}">
        </div>
        <div class="mb-3">
            <label for="aptitude" class="form-label">Aptitude:</label>
            <input type="text" name="aptitude" class="form-control" value="{{ $takerScore->aptitude }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
