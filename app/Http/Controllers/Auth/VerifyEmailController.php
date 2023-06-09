<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            switch ($request->user()->role) {
                case 'admin':
                    return redirect()->route('trainers')->with('verified', '1');
                    break;
                case 'trainer':
                    return redirect()->route('coders')->with('verified', '1');
                    break;
                default:
                    return redirect()->route('evaluations')->with('verified', '1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        //return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
