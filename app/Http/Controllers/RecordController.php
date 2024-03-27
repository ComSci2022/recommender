<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function showRecordForm()
    {
        return view('record');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'linguistics_score' => 'required|numeric',
            'mathematics_score' => 'required|numeric',
            'science_score' => 'required|numeric',
           'aptitude_score' => 'required|numeric',
        ]);

        // Calculate total score
        $totalScore = $validatedData['linguistics_score'] + $validatedData['mathematics_score'] +
                      $validatedData['science_score'] + $validatedData['aptitude_score'];

        // Store the record in the database
        // Assuming you have a Record model and a corresponding table in your database
        $record = new Record();
        $record->name = $validatedData['name'];
        $record->linguistics_score = $validatedData['linguistics_score'];
        $record->mathematics_score = $validatedData['mathematics_score'];
        $record->science_score = $validatedData['science_score'];
        $record->aptitude_score = $validatedData['aptitude_score'];
        $record->total_score = $totalScore;
        $record->save();

        // Redirect the user to a success page
        return redirect()->route('record.success');
    }

    public function success()
    {
        return view('record.success');
    }

}
