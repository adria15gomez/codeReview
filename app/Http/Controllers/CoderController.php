<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Promotion;

class CoderController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('trainer.coders', compact('users'));
    }

    public function create()
    {
        $promotions = Promotion::all();
        return view('trainer.agregarCoder', compact('promotions'));
    }

    public function assignToBootcamp(Request $request)
    {
        $email = $request->input('email');
        $promotionID = $request->input('promotion_id');

        $user = User::where('email', $email)->first();

        $user->promotion_id = (int)$promotionID;

        $user->save();

        redirect()->route('coderDetail.show', ['id_coder' => $user->id]);
    }

    public function show($id_coder)
    {
        return view('coderDetail.show', ['id_coder' => $id_coder]);
    }
}
