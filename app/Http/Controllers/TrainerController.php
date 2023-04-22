<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->where('role', 'admin')->firstOrFail();
        $trainers = User::where('role', 'trainer')->paginate(2);
        return view('superAdmin.trainers', compact('trainers'));
    }

    public function destroy($id)
    {
        $trainer = User::where('role', 'trainer')->findOrFail($id);
        $trainer->delete();

        return redirect()->route('trainers');
    }
}
