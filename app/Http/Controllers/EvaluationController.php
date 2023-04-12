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
        $evaluations = Evaluation::all();
        return view('coder.misEvaluaciones', compact('evaluations'));
    }

    public function create ()
    {
        $topics = Topic::all();
        return view('coder.autoevaluacion', compact('topics'));
    }

    // public function createCoevalua ()
    // {
    //     $topics = Topic::all();
    //     $users = User::all();
    //     return view('coder.coevaluacion', compact('topics', 'users'));
    // }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            // $users = User::findOrFail($request->input('id_user_coevaluator'));

            $evaluation = new Evaluation;
            $evaluation->evaluation_date = now();
            $evaluation->id_user_evaluated = auth()->id();
            // $evaluation->id_user_coevaluator = $users->id;
            $evaluation->save();

            foreach ($request->topics as $topicId => $level) {
                $autoeval = new Autoevaluation();
                $autoeval->topic_id = $topicId;
                $autoeval->evaluation_id = $evaluation->id;
                $autoeval->level = $level;
                $autoeval->save();

                // $coeval = new Coevaluation();
                // $coeval->topic_id = $topicId;
                // $coeval->evaluation_id = $evaluation->id;
                // $coeval->level = $level;
                // $coeval->save();
            }

            $evaluation->pp_autoeval = round(collect($request->topics)->flatten()->avg());
            $evaluation->pp_cooeval = round(collect($request->topics)->flatten()->avg());
            $evaluation->save();
        });

        return redirect()->route('evaluations');
    }

}