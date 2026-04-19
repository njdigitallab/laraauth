<?php

namespace NjDigitalLab\Laraauth\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use NjDigitalLab\Laraauth\Laraauth;

class EmailVerificationController
{
    /**
     * Display the email verification notice..
     */
    public function notice(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(Laraauth::getEmailVerificationRedirectRoute())
            : view('laraauth::verify-email');
    }

    /**
     * Mark the authenticated user's email address as verified.
     */
    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(Laraauth::getEmailVerificationRedirectRoute().'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(Laraauth::getEmailVerificationRedirectRoute().'?verified=1');
    }

    /*
     * Send a new email verification notification.
     */
    public function email(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(Laraauth::getEmailVerificationRedirectRoute());
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}