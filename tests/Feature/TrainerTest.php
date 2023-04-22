<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class TrainerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function index()
    {
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
