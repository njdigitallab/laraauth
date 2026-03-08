<?php

namespace NjDigitalLab\Laraauth\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use NjDigitalLab\Laraauth\Actions\EnsureLoginIsNotRateLimited;
use NjDigitalLab\Laraauth\Actions\GetLoginThrottleKey;
use NjDigitalLab\Laraauth\Facades\Laraauth;

class LoginController
{
    /**
     * Retrieve the login view.
     */
    public function view(): View
    {
        return view('laraauth::login');
    }

    /**
     * Handle an authentication attempt.
     * 
     * @throws Illuminate\Validation\ValidationException
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        new EnsureLoginIsNotRateLimited()->execute($request);
 
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit(GetLoginThrottleKey::execute($request));

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);  
        }
 
        RateLimiter::clear(GetLoginThrottleKey::execute($request));

        $request->session()->regenerate();

        return redirect()->intended(Laraauth::getLoginRedirectRoute());
    }
}