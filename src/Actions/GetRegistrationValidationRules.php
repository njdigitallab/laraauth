<?php

namespace NjDigitalLab\Laraauth\Actions;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use NjDigitalLab\Laraauth\Laraauth;

class GetRegistrationValidationRules
{
    /**
     * Get the validation rules.
     */
    public static function execute(Request $request): array
    {
        $userClass = config('auth.providers.users.model');

        $rules = [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.$userClass],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];

        if (Laraauth::shouldAllowFirstAndLastName()) {
            $rules['first_name'] = ['required', 'string', 'max:255'];
            $rules['last_name'] = ['required', 'string', 'max:255'];
        } else {
            $rules['name'] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}