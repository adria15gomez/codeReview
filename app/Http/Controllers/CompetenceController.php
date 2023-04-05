<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::all();
        return view('competence', compact('competences'));
    }

    public function create()
    {
        return view('addCompetence');
    }

    public function store(Request $request)
    {
        $competences = new Competence();

        $competences->name = $request->name;
        $competences->save();

        return redirect()->route('competence', $competences);
    }

    public function edit($id)
    {
        $competence = Competence::find($id);
        return view('editCompetence', compact('competence'));
    }

    public function update(Request $request, $id)
    {
        $competences = Competence::findOrFail($id);

        $competences->name = $request->name;
        $competences->save();

        return redirect()->route('competences', $competences);
    }

    public function destroy(Request $request, $id)
    {
        $competence = Competence::findOrFail($id);
        $competence->id = $request->id;
        $competence->delete();

        return redirect()->route('competence', $competence);
    }
}
