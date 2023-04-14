<?php

namespace App\Http\Controllers;

use App\Models\Autoevaluation;
use App\Models\Coevaluation;
use App\Models\Evaluation;
use App\Models\Topic;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('coder.misEvaluaciones', compact('evaluations'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('coder.autoevaluacion', compact('topics'));
    }

    public function createCoevalua()
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
                $id_user_evaluated = $request->input('id_user_coevaluator');
                $id_user_coevaluator = auth()->id();
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

    public function compare($user_id, $date)
    {

        $autoevaluation = DB::table('evaluations_topics_autoevaluations')
            ->join('evaluations', 'evaluations.id', '=', 'evaluations_topics_autoevaluations.evaluation_id')
            ->join('topics', 'topics.id', '=', 'evaluations_topics_autoevaluations.topic_id')
            ->select('topics.name', 'evaluations_topics_autoevaluations.level')
            ->where('evaluations.id_user_evaluated', $user_id)
            ->where('evaluations.evaluation_date', $date)
            ->get();


        $coevaluations = DB::table('evaluations_topics_coevaluations')
            ->join('evaluations', 'evaluations.id', '=', 'evaluations_topics_coevaluations.evaluation_id')
            ->join('topics', 'topics.id', '=', 'evaluations_topics_coevaluations.topic_id')
            ->select('topics.name', 'evaluations_topics_coevaluations.level')
            ->where('evaluations.id_user_evaluated', $user_id)
            ->where('evaluations.evaluation_date', $date)
            ->get();

        // Si da tiempo a relacionar con las fechas de la tabla Promotion
        // if ($date == Promotion::find('evaluation1')){
        //     $evaluation = 1;
        // } else if ($date == Promotion::find('evaluation2')){
        //     $evaluation = 2;
        // } else if ($date == Promotion::find('evaluation3')){
        //     $evaluation = 3;
        // } else {
        //     $evaluation = 4
        // }

        dd($coevaluations);
        return view('coder.comparison', [
            'user_id' => $user_id,
            'date' => $date,
            'autoevaluation' => $autoevaluation,
            'coevaluations' => $coevaluations,
        ]);
    }
}
