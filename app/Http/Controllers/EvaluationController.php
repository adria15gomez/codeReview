<?php

namespace App\Http\Controllers;

use App\Models\Autoevaluation;
use App\Models\Coevaluation;
use App\Models\Evaluation;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index ()
    {
        $evaluations = auth()->user()->evaluations;
        return view('coder.misEvaluaciones', compact('evaluations'));
    }

    public function create ()
    {
        $topics = Topic::all();
        return view('coder.autoevaluacion', compact('topics'));
    }

    public function createCoevalua ()
    {
        $topics = Topic::all();
        $users = User::all();
        return view('coder.coevaluacion', compact('topics', 'users'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $evaluationType = $request->input('evaluationType');

            if ($evaluationType === 'autoevaluacion') {
                $id_user_evaluated = auth()->id();
                $id_user_coevaluator = null;
            } else {
                $id_user_evaluated = auth()->id();
                $id_user_coevaluator = $request->input('id_user_coevaluator');
            }

            $evaluation = new Evaluation;
            $evaluation->evaluation_date = now();
            $evaluation->id_user_evaluated = $id_user_evaluated;
            $evaluation->id_user_coevaluator = $id_user_coevaluator;
            $evaluation->save();

            foreach ($request->topics as $topicId => $level) {
                if ($evaluationType === 'autoevaluacion') {
                    $evaluations = new Autoevaluation();
                } else {
                    $evaluations = new Coevaluation();
                }
    
                $evaluations->topic_id = $topicId;
                $evaluations->evaluation_id = $evaluation->id;
                $evaluations->level = $level;
                $evaluations->save();
            }
    
            if ($evaluationType === 'autoevaluacion') {
                $evaluation->pp_autoeval = round(collect($request->topics)->flatten()->avg());
                $evaluation->save();
            } else {
                $evaluation->pp_coeval = round(collect($request->topics)->flatten()->avg());
                $evaluation->save();
            }
        });

        return redirect()->route('evaluations');
    }

    public function show()
    {
        return view('coder.resultadosEvaluacion');
    }

}