<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competence;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view('topic', compact('topics'));
    }

    public function create()
    {
        $competences = Competence::all();
        return view('addTopic', compact('competences'));
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
        $topic = Topic::find($id);
        return view('editTopic', compact('topic'));
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
