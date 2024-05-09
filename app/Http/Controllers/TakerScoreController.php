<?php

namespace App\Http\Controllers;

use App\Models\TakerScore;
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

        $totalScore = $takerScore->totalscore;

        $courses = [
            'AB English Language' => 115,
            'AB Political Science' => 95,
            'AB Filipino' => 105,
            'BS Computer Science' => 145,
            'BS Information Technology' => 135,
            'BS Criminology' => 115,
            'BSED Mathematics' => 120,
            'BSED English' => 110,
            'BSED Filipino' => 100,
            'Bachelor in Elementary Education' => 100,
            'BS Mechanical Engineering' => 155,
            'BS Electrical Engineering' => 140,
            'BS Civil Engineering' => 140,
            'BS Electronics Engineering' => 155,
            'BS Computer Engineering' => 150,
            'BSBA Marketing Management' => 110,
            'BSBA Operation Management' => 90,
            'BSBA Financial Management' => 100,
        ];

        // Sort courses by their minimum total scores in descending order
        arsort($courses);

        $recommendations = [];
        foreach ($courses as $course => $minScore) {
            if ($totalScore >= $minScore) {
                $recommendations[] = $course;
            }
        }

        $recommendations = array_slice($recommendations, 0, 3); // Get the top 3 recommendations

        return view('score', compact('takerScore', 'recommendations'));
    }

}
