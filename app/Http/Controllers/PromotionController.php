<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    public function index()
    {
        $trainer = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $promotions = Promotion::paginate(8);
        $topics = Topic::all();
        return view('trainer.promotions', ['promotions' => $promotions, 'topics' => $topics]);
    }

    public function create()
    {
        $users = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $users = User::where('role', 'trainer')->get();
        $topics = Topic::all();
        return view('trainer.addPromotion', compact('topics', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([    
            'name' => 'required',    
            'trainer' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'topic_id' => 'required',
            'evaluation1' => 'required',
            'evaluation2' => 'required',
            'evaluation3' => 'required',
            'evaluation4' => 'required',
            'zoom_url' => 'required',
            'slack_url' => 'required',
        ], 
            [
                'name.required' => 'El campo promoción es obligatorio',    
                'trainer.required' => 'El campo formador/a es obligatorio',
                'start_date.required' => 'El campo fecha inicio es obligatorio',
                'end_date.required' => 'El campo fecha fin es obligatorio',
                'topic_id.required' => 'Debes seleccionar un topic',
                'evaluation1.required' => 'El campo evaluacion1 es obligatorio',
                'evaluation2' => 'El campo evaluacion2 es obligatorio',
                'evaluation3.required' => 'El campo evaluacion3 es obligatorio',
                'evaluation4.required' => 'El campo evaluacion4 es obligatorio',
                'zoom_url.required' => 'El campo zoom URL es obligatorio',
                'slack_url.required' => 'El campo slack URL es obligatorio',
        ]);
        
        $promotion = new Promotion();

        $promotion->name = $request->name;
        $promotion->trainer = $request->trainer;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->evaluation1 = $request->evaluation1;
        $promotion->evaluation2 = $request->evaluation2;
        $promotion->evaluation3 = $request->evaluation3;
        $promotion->evaluation4 = $request->evaluation4;
        $promotion->zoom_url = $request->zoom_url;
        $promotion->slack_url = $request->slack_url;

        $promotion->save();

        $promotion->topics()->sync($request->topics);

        $topics = Topic::all();

        if ($request->has('form_submitted') && $request->input('action') === 'addTopic') {
            $topics[] = Topic::find(1);
        }

        return redirect()->route('promotions.show', compact('promotion', 'topics'));
    }


    public function edit($promotion)
    {
        $trainer = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $promotion = Promotion::find($promotion);
        $topics = Topic::all();

        return view('trainer.editPromotion', compact('promotion', 'topics', 'users'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $promotion->id = $promotion->id;

        $promotion->name = $request->name;
        $promotion->trainer = $request->trainer;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->evaluation1 = $request->evaluation1;
        $promotion->evaluation2 = $request->evaluation2;
        $promotion->evaluation3 = $request->evaluation3;
        $promotion->evaluation4 = $request->evaluation4;
        $promotion->zoom_url = $request->zoom_url;
        $promotion->slack_url = $request->slack_url;

        $promotion->save();

        $promotion->topics()->sync($request->topics);
        $topics = Topic::all();
        $promotion->topic_id = $request->topic_id;

        return redirect()->route('promotions.show', compact('promotion', 'topics'));
    }


    public function showTrainer($promotion)
    {
        $trainer = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $promotions = Promotion::findOrFail($promotion);
        $topics = $promotions->topics()->orderBy('promotion_topic.id')->get();
        $competences = $promotions->topics()->with('competence')->get()->pluck('competence')->unique();
        $coders = User::where('promotion_id', $promotion)->get();

        return view('trainer.bootcampDetail', compact('promotions', 'topics', 'competences', 'coders'));
    }

    public function showCoder()
    {
        $coder = User::where('id', Auth::id())->where('role', 'coder')->firstOrFail();
        $promotions = Promotion::find($coder->promotion->id);
        $topics = $promotions->topics()->orderBy('promotion_topic.id')->get();
        $competences = $promotions->topics()->with('competence')->get()->pluck('competence')->unique();

        return view('coder.miBootcamp', compact('promotions', 'topics', 'competences'));
    }

    public function destroy(Request $request, $promotion)
    {
        $promotion = Promotion::findOrFail($promotion);
        $promotion->id = $request->id;
        $promotion->delete();

        return redirect()->route('trainer.promotions');
    }
}
