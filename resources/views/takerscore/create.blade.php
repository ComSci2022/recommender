@extends('layouts.app')

@section('title')
Create A Taker Score
@endsection

@section('content')
    <h1>Taker Score Form</h1>
    <form action="{{ route('takerscores.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="taker_id" class="form-label">Taker ID:</label>
            <input type="text" name="taker_id" class="form-control">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name:</label>
            <input type="text" name="lname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" name="fname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="mid_ini" class="form-label">Middle Initial:</label>
            <input type="text" name="mid_ini" class="form-control">
        </div>
        <div class="mb-3">
            <label for="linguistics" class="form-label">Linguistics:</label>
            <input type="text" name="linguistics" class="form-control">
        </div>
        <div class="mb-3">
            <label for="mathematics" class="form-label">Mathematics:</label>
            <input type="text" name="mathematics" class="form-control">
        </div>
        <div class="mb-3">
            <label for="science" class="form-label">Science:</label>
            <input type="text" name="science" class="form-control">
        </div>
        <div class="mb-3">
            <label for="aptitude" class="form-label">Aptitude:</label>
            <input type="text" name="aptitude" class="form-control">
        </div>
        <div class="mb-3">
            <label for="first_choice" class="form-label">First Choice:</label>
            <input type="text" name="first_choice" class="form-control">
        </div>
        <div class="mb-3">
            <label for="second_choice" class="form-label">Second Choice:</label>
            <input type="text" name="second_choice" class="form-control">
        </div>
        <div class="mb-3">
            <label for="third_choice" class="form-label">Third Choice:</label>
            <input type="text" name="third_choice" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
