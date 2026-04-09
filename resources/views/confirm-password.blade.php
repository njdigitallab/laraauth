@extends('laraauth::layouts.auth')

@section('title', 'Confirm Password')

@section('content')
    <form class="auth-form" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">

            @include('laraauth::partials.errors', [
                'errorName' => 'password'
            ])
        </div>

        <div class="button-container">
            <button type="submit" id="confirm-password-button" class="submit-button">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
@endsection