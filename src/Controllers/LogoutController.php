<?php

namespace NjDigitalLab\Laraauth\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NjDigitalLab\Laraauth\Facades\Laraauth;

class LogoutController
{
    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect(Laraauth::getLogoutRoute());
    }
}