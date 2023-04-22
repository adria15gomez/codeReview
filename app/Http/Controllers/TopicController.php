<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        $trainer = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $topics = Topic::all();
        return view('trainer.topic', compact('topics'));
    }

    public function create()
    {
        $trainer = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $competences = Competence::all();
        return view('trainer.addTopic', compact('competences'));
    }

    public function store(Request $request)
    {
        $topics = new Topic();

        $topics->name = $request->name;
        $topics->competence_id = $request->competence_id;
        $topics->save();

        return redirect()->route('topic', $topics);
    }

    public function edit($id)
    {
        $trainer = User::where('id', Auth::id())->where('role', 'trainer')->firstOrFail();
        $topic = Topic::find($id);
        $competences = Competence::all();
        return view('trainer.editTopic', compact('topic', 'competences'));
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        $topic->name = $request->name;
        $topic->competence_id = $request->competence_id;
        $topic->save();

        return redirect()->route('topic', $topic);
    }

    public function destroy(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->id = $request->id;
        $topic->competence_id = $request->competence_id;
        $topic->delete();

        return redirect()->route('topic', $topic);
    }
}
