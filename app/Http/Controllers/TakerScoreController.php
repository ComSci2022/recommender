<?php

namespace App\Http\Controllers;

use App\Models\TakerScore;
use App\Models\Course;
use Illuminate\Http\Request;

class TakerScoreController extends Controller
{
    public function index()
    {
        $takerScores = TakerScore::all();
        return view('takerscore.index', ['takerScores' => $takerScores]);
    }

    public function show(Request $request)
    {
        $taker_id = $request->input('taker_id');
        $last_name = $request->input('lname');

        $takerScore = TakerScore::where('taker_id', $taker_id)
            ->where('lname', $last_name)
            ->first();

        if (!$takerScore) {
            return redirect()->back()->with('error', 'Taker not found.');
        }

        return view('score', compact('takerScore'));
    }

    public function create()
    {
        return view('takerscore.create');
    }

    public function store(Request $request)
    {
        $takerScore = new TakerScore;
        $takerScore->taker_id = $request->taker_id;
        $takerScore->lname = $request->lname;
        $takerScore->fname = $request->fname;
        $takerScore->mid_ini = $request->mid_ini;
        $takerScore->linguistics = $request->linguistics;
        $takerScore->mathematics = $request->mathematics;
        $takerScore->science = $request->science;
        $takerScore->aptitude = $request->aptitude;
        $takerScore->totalscore = $request->linguistics + $request->mathematics + $request->science + $request->aptitude;
        $takerScore->first_choice = $request->first_choice;
        $takerScore->second_choice = $request->second_choice;
        $takerScore->third_choice = $request->third_choice;
        $takerScore->save();

        return redirect()->route('takerscores.index')->with('success', 'TakerScore created successfully');
    }

    public function edit($takerScoreId)
    {
        $takerScore = TakerScore::findOrFail($takerScoreId);
        return view('takerscore.edit', compact('takerScore'));
    }       

    public function update(Request $request, $takerScoreId)
    {
        $takerScore = TakerScore::find($takerScoreId);
        $takerScore->taker_id = $request->taker_id;
        $takerScore->lname = $request->lname;
        $takerScore->fname = $request->fname;
        $takerScore->mid_ini = $request->mid_ini;
        $takerScore->linguistics = $request->linguistics;
        $takerScore->mathematics = $request->mathematics;
        $takerScore->science = $request->science;
        $takerScore->aptitude = $request->aptitude;
        $takerScore->totalscore = $request->linguistics + $request->mathematics + $request->science + $request->aptitude;
        $takerScore->first_choice = $request->first_choice;
        $takerScore->second_choice = $request->second_choice;
        $takerScore->third_choice = $request->third_choice;
        $takerScore->save();

        return redirect()->route('takerscores.index')->with('success', 'TakerScore updated successfully');
    }

    public function destroy($takerScoreId)
    {
        $takerScore = TakerScore::find($takerScoreId);
        $takerScore->delete();
        return redirect()->route('takerscores.index')->with('success', 'TakerScore deleted successfully');
    }

    public function recommendCourse(Request $request)
    {
        $taker_id = $request->input('taker_id');
        $last_name = $request->input('lname');
    
        $takerScore = TakerScore::where('taker_id', $taker_id)
            ->where('lname', $last_name)
            ->first();
    
        if (!$takerScore) {
            return redirect()->back()->with('error', 'Taker not found.');
        }
    
        // Fetch courses matching criteria
        $matchedCourses = Course::where('linguistics', '<=', $takerScore->linguistics)
            ->where('mathematics', '<=', $takerScore->mathematics)
            ->where('science', '<=', $takerScore->science)
            ->where('aptitude', '<=', $takerScore->aptitude)
            ->orderBy('total_score', 'desc')
            ->get();
    
        // Check if any courses were found
        if ($matchedCourses->isEmpty()) {
            return view('score', compact('takerScore'))->with('error', 'No recommendations found.');
        }
    
        // Fetch course names for the matched courses
        $courseNames = $matchedCourses->pluck('course_name')->toArray();
    
        // Check for first_choice, second_choice, and third_choice
        $preferredCourses = [];
        $choices = [
            $takerScore->first_choice,
            $takerScore->second_choice,
            $takerScore->third_choice
        ];
    
        foreach ($choices as $choice) {
            if (in_array($choice, $courseNames)) {
                $preferredCourses[] = $choice;
                // Remove the choice from courseNames to avoid duplication
                $courseNames = array_diff($courseNames, [$choice]);
            }
        }
    
        // Merge preferred courses with the remaining recommended courses and limit to 3
        $courseNames = array_merge($preferredCourses, $courseNames);
        $courseNames = array_slice($courseNames, 0, 3);
    
        return view('score', compact('takerScore', 'courseNames'));
    }    
    
}
