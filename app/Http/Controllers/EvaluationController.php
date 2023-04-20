<?php

namespace App\Http\Controllers;

use App\Models\Autoevaluation;
use App\Models\Coevaluation;
use App\Models\Evaluation;
use App\Models\Topic;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function dashboard()
    {
        return view('coder.misEvaluaciones');
    }

    public function index()
    {
        $user = auth()->user();
        $evaluations = Evaluation::where('id_user_evaluated', $user->id)->select('evaluation_date')->distinct()->get();

        return view('coder.resultadosEvaluacion', compact('user', 'evaluations'));
    }

    public function create()
    {
        $this->authorize('createEvaluations', Evaluation::class);
        $topics = Topic::all();
        return view('coder.autoevaluacion', compact('topics'));
    }

    public function createCoevalua()
    {
        $topics = Topic::all();
        $users = User::where('role', 'coder')->get();;
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

        return view('coder.comparison', [
            'user_id' => $user_id,
            'date' => $date,
            'autoevaluation' => $autoevaluation,
            'coevaluations' => $coevaluations,
        ]);
    }

    public function showProgressBar()
    {
        $user_id = auth()->user()->id;

        $autoevaluacion = Evaluation::where('id_user_evaluated', $user_id)
            ->whereNull('id_user_coevaluator')
            ->value('pp_autoeval') ?? 0.0;

        $coevaluacion = Evaluation::where('id_user_evaluated', $user_id)
            ->whereNotNull('id_user_coevaluator')
            ->value('pp_coeval') ?? 0.0;

        $average = round(($autoevaluacion + $coevaluacion) / 2, 2);

        return [
            'average' => $average,
            'autoevaluacion' => $autoevaluacion,
            'coevaluacion' => $coevaluacion,
        ];
    }
}
