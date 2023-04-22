<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = User::where('role', 'trainer')->paginate(8);
        return view('superAdmin.trainers', compact('trainers'));
    }

    public function destroy($id)
    {
        $trainer = User::where('role', 'trainer')->findOrFail($id);
        $trainer->delete();

        return redirect()->route('trainers');
    }
}
