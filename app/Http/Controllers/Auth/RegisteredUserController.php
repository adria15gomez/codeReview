<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // create user with default role
        $userRol = 'coder';

        if (User::count() === 0) { // first user is admin
            $userRol = 'admin';
        } elseif (strpos($request->email, '@factoriaf5.org') !== false) {
            $userRol = 'trainer';
        } else {
            $userRol = 'coder';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);



        // return redirect(RouteServiceProvider::HOME);

        switch ($userRol) {
            case 'admin':
                return redirect()->route('trainers');
                break;
            case 'trainer':
                return redirect()->route('coders');
                break;
            default:
                return redirect()->route('evaluations');
        }
    }
}
