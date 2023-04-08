<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function assignRole(Request $request)
    {
        $user = User::find($request->input('user_id'));

        $user->update(['rol' => $request->input('rol')]);

        return redirect()->back()->with('success', 'Rol asignado correctamente.');
    }
}
