<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function showResults()
    {
        $results = [
           
        ];

        return view('results', ['results' => $results]);
    }
}

