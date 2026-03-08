<?php

namespace NjDigitalLab\Laraauth\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use NjDigitalLab\Laraauth\Facades\Laraauth;

class ConfirmPasswordController
{
    /**
     * Show the confirm password view.
     */
    public function view(): View
    {
        return view('laraauth::confirm-password');
    }

    /**
     * Confirm the user's password.
     * 
     * @throws Illuminate\Validation\ValidationException
     */
    public function confirm(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(Laraauth::getConfirmPasswordRedirectRoute());
    }
}