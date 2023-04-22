<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenceController extends Controller
{
    public function index()
    {
        $admin = User::where('id', Auth::id())->where('role', 'admin')->firstOrFail();
        $competences = Competence::all();
        return view('superAdmin.competence', compact('competences'));
    }

    public function create()
    {
        $admin = User::where('id', Auth::id())->where('role', 'admin')->firstOrFail();
        return view('superAdmin.addCompetence');
    }

    public function store(Request $request)
    {
        $request->validate([    
            'name' => 'required',    
            'description' => 'required'], 
            [
                'name.required' => 'El campo marco de competencia es obligatorio',    
                'description.required' => 'El campo competencia es obligatorio'
        ]);
        
        $competences = new Competence();

        $competences->name = $request->name;
        $competences->description = $request->description;
        $competences->save();

        return redirect()->route('competence', $competences);
    }

    public function edit($id)
    {
        $admin = User::where('id', Auth::id())->where('role', 'admin')->firstOrFail();
        $competence = Competence::find($id);
        return view('superAdmin.editCompetence', compact('competence'));
    }

    public function update(Request $request, $id)
    {
        $competence = Competence::findOrFail($id);

        $competence->name = $request->name;
        $competence->description = $request->description;
        $competence->save();

        return redirect()->route('competence', $competence);
    }

    public function destroy($competence_id)
    {
        $competence = Competence::find($competence_id);
        $topics = Topic::where('competence_id', $competence_id)->get();
        foreach ($topics as $topic) {
            $topic->delete();
        }
        $competence->delete();

        return redirect()->route('competence', $competence);
    }
}
