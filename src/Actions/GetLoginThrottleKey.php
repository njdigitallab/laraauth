<?php

namespace NjDigitalLab\Laraauth\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GetLoginThrottleKey
{
    /**
     * Get the login throttle key.
     */
    public static function execute(Request $request): string
    {
        return Str::transliterate(Str::lower($request->string('email')).'|'.$request->ip());
    }
}