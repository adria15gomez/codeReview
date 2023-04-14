<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Topic;
use App\Models\User;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        $topics = Topic::all();
        return view('trainer.promotions', compact('promotions'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('trainer.addPromotion', compact('topics'));
    }


    public function store(Request $request)
    {
        $promotion = new Promotion();

        $promotion->name = $request->name;
        $promotion->trainer = $request->trainer;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        //$promotion->topic_id = $request->topic_id;
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

        return view('addPromotion', ['promotion' => $promotion, 'topics' => $topics]);
    }


    public function edit($promotion)
    {
        $promotion = Promotion::find($promotion);
        $topics = Topic::all();

        return view('editPromotion', compact('promotion', 'topics'));
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

        //return view('editPromotion', ['promotion' => $promotion, 'topics' => $topics]);

        return redirect()->route('promotions', $promotion);
    }

    public function show()
    {
        $promotions = Promotion::all();
        $users = User::all();
        $topics = Topic::all();
        $competences = Competence::all();
        return view('coder.miBootcamp', compact('promotions', 'users', 'topics', 'competences'));
    }
    public function destroy(Request $request, $promotion)
    {
        $promotion = Promotion::findOrFail($promotion);
        $promotion->id = $request->id;
        $promotion->delete();

        return redirect()->route('promotions');
    }
}
