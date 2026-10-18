@extends('laraauth::layouts.guest')

@section('title', 'Login')

@section('content')
    <form id="login-form" class="auth-form" method="POST" action="{{ route('login') }}">
        @csrf

        @include('laraauth::partials.status')
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="email">

            @include('laraauth::partials.errors', [
                'errorName' => 'email'
            ])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">

            @include('laraauth::partials.errors', [
                'errorName' => 'password'
            ])
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="remember-me-checkbox" name="remember">
                <span class="remember-me-text">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="button-container">
            @if (Route::has('password.request'))
                <a id="forgot-password-link" class="form-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" id="login-button" class="submit-button">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
@endsection