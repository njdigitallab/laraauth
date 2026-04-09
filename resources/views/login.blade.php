@extends('laraauth::layouts.guest')

@section('title', 'Login')

@section('content')
    @if (Session::Has('status'))
        {{ session('status') }}
    @endif

    <form method="POST" class="auth-form" action="{{ route('login') }}">
        @csrf
        
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

        <div class="mt-4 items-center flex justify-end">
            @if (Route::has('password.request'))
                <a class="forgot-password-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="login-button">Login</button>
        </div>
    </form>
@endsection