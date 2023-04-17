<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CoderController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('trainer.coders', compact('users'));
    }
}
