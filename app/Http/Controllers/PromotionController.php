<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Topic;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        $topics = Topic::all();
        return view('promotions', compact('promotions'));
    }

    public function create()
    {
        $topics = Topic::all();
        return view('addPromotion', compact('topics'));
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

        //$promotion->topic_id = $request->topic_id ?? 1;
        $promotion->save();

        // $topic = new Topic;
        // $topic->name = 'Some topic';
        // $promotion->topic()->save($topic);

        $promotion->topics()->sync($request->topics);

        $topics = Topic::all();

        if ($request->has('form_submitted') && $request->input('action') === 'addTopic') {
            $topics[] = Topic::find(1);
        }

        return view('addPromotion', ['promotion' => $promotion, 'topics' => $topics]);
    }


    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('editPromotion', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $promotion = Promotion::findOrFail($promotion);

        $promotion->name = $request->name;
        $promotion->trainer = $request->trainer;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->topic_id = $request->topic_id;
        $promotion->evaluation1 = $request->evaluation1;
        $promotion->evaluation2 = $request->evaluation2;
        $promotion->evaluation3 = $request->evaluation3;
        $promotion->evaluation4 = $request->evaluation4;
        $promotion->zoom_url = $request->zoom_url;
        $promotion->slack_url = $request->slack_url;

        $promotion->save();
        return redirect()->route('promotion', $promotion);
    }

    public function destroy(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->id = $request->id;
        $promotion->delete();

        return redirect()->route('promotion', $promotion);
    }
}
