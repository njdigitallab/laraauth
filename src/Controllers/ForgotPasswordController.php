<?php

namespace NjDigitalLab\Laraauth\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController
{
    /**
     * Display the password reset link view.
     */
    public function view(): View
    {
        return view('laraauth::forgot-password');
    }

    /**
     * Handle the request to email the password reset link.
     */
    public function email(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}