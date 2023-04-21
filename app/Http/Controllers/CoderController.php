<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EvaluationController;

class CoderController extends Controller
{
    public function index(EvaluationController $evaluationController)
    {
        $users = User::where('role', 'coder')->paginate(2);
        $progressBarData = [];
        foreach ($users as $user) {
            $progressBarData[$user->id] = (new EvaluationController)->showProgressBar($user->id);
        }
        return view('trainer.coders', compact('users', 'progressBarData'));
    }

    public function create()
    {
        $promotions = Promotion::all();
        $users = User::where('role', 'coder')->get();
        return view('trainer.agregarCoder', compact('promotions', 'users'));
    }

    public function assignToBootcamp(Request $request)
    {
        $email = $request->input('email');
        $promotionID = $request->input('promotion_id');

        $user = User::where('email', $email)->first();

        $user->promotion_id = (int)$promotionID;

        $user->save();

        return redirect()->route('coderDetail.show', ['id' => $user->id]);
    }

    public function show($id)
    {
        $coder = User::findOrFail($id);
        $progressBarData = (new EvaluationController)->showProgressBar($coder->id);
        $evaluations = Evaluation::where('id_user_evaluated', $coder->id)->select('evaluation_date')->distinct()->get();
        return view('trainer.coderDetail', compact('coder', 'evaluations', 'progressBarData'));
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

        $user = User::findOrFail($user_id);

        return view('trainer.comparisonEvaluation', [
            'user' => $user,
            'date' => $date,
            'autoevaluation' => $autoevaluation,
            'coevaluations' => $coevaluations,
        ]);
    }

    public function edit($id)
    {
        $coder = User::find($id);
        $promotions = Promotion::all();
        return view('trainer.editarCoder', compact('coder', 'promotions'));
    }

    public function update(Request $request, $id)
    {
        $email = $request->input('email');
        $promotionID = $request->input('promotion_id');

        $user = User::find($id);

        $user->email = $email;  
        $user->promotion_id = (int)$promotionID;
        
        $user->save();

        return redirect()->route('coderDetail.show', ['id' => $user->id]);
    }

    public function destroy($id)
    {
        $coder = User::findOrFail($id);
        $coder->delete();

        return redirect()->route('coders');
    }
}
