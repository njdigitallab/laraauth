@extends('laraauth::layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <form class="auth-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="pb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @include('laraauth::partials.status')

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">

            @include('laraauth::partials.errors', [
                'errorName' => 'email'
            ])
        </div>

        <div class="mt-4 items-center flex justify-end">
            <a id="forgot-password-login-link" class="form-link" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>

            <button type="submit" class="submit-button">{{ __('Email Password Reset Link') }}</button>
        </div>
    </form>
@endsection