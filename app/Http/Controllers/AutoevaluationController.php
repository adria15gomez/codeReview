<?php

namespace App\Http\Controllers;

use App\Models\Autoevaluation;
use App\Models\Evaluation;
use App\Models\Topic;
use Illuminate\Http\Request;

class AutoevaluationController extends Controller
{
    public function create ()
    {
        $topics = Topic::all();
        return view('coder.autoevaluacion', compact('topics'));
    }

    public function store(Request $request)
    {
        $autoevaluation = new Autoevaluation();
        $autoevaluation->topic_id = $request->topic_id;
        $autoevaluation->evaluation_id = 
        $autoevaluation->level = $request->input('level');

        
        $autoevaluation->save();
    }
}
