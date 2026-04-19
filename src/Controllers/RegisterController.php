<?php

namespace NjDigitalLab\Laraauth\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use NjDigitalLab\Laraauth\Actions\GetRegistrationValidationRules;
use NjDigitalLab\Laraauth\Actions\GetUserRegistrationAttributes;
use NjDigitalLab\Laraauth\Laraauth;

class RegisterController
{
    /**
     * Retrieve the register view.
     */
    public function view(): View
    {
        return view('laraauth::register');
    }

    /**
     * Register the user.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate(GetRegistrationValidationRules::execute($request));

        $user = User::create(GetUserRegistrationAttributes::execute($request));

        event(new Registered($user));

        Auth::login($user);

        return redirect(Laraauth::getRegisterRedirectRoute());
    }
}