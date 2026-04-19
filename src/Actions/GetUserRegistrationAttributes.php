<?php

namespace NjDigitalLab\Laraauth\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use NjDigitalLab\Laraauth\Laraauth;

class GetUserRegistrationAttributes
{
    /**
     * Get the validation rules.
     */
    public static function execute(Request $request): array
    {
        $attributes = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if (Laraauth::shouldAllowFirstAndLastName()) {
            $attributes['first_name'] = $request->first_name;
            $attributes['last_name'] = $request->last_name;
        } else {
            $attributes['name'] = ['required', 'string', 'max:255'];
        }

        return $attributes;
    }
}