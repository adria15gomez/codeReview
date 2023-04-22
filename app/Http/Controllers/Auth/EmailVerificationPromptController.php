<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        $user = $request->user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('trainers');
                break;
            case 'trainer':
                return redirect()->route('coders');
                break;
            default:
                return redirect()->route('evaluations');
        }


        // return $request->user()->hasVerifiedEmail()
        //     ? redirect()->intended(RouteServiceProvider::HOME)
        //     : view('auth.verify-email');
    }
}
