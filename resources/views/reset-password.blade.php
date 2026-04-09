@extends('laraauth::layouts.guest')

@section('title', 'Reset Password')

@section('content')

    <form class="auth-form" method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email">
            
            @include('laraauth::partials.errors', [
                'errorName' => 'email'
            ])
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
            
            @include('laraauth::partials.errors', [
                'errorName' => 'password'
            ])
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
            
            @include('laraauth::partials.errors', [
                'errorName' => 'password_confirmation'
            ])
        </div>

        <div class="button-container">
            <a id="reset-password-login-link" class="form-link" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>

            <button type="submit" class="submit-button">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
@endsection