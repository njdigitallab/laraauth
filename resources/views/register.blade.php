@extends('laraauth::layouts.guest')

@section('title', 'Register')

@section('content')

    <form class="auth-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required autofocus autocomplete="first-name">
            
            @include('laraauth::partials.errors', [
                'errorName' => 'first_name'
            ])
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required autocomplete="last-name">
            
            @include('laraauth::partials.errors', [
                'errorName' => 'last_name'
            ])
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="email">
            
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

        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
            
            @include('laraauth::partials.errors', [
                'errorName' => 'password_confirmation'
            ])
        </div>

        <div class="mt-4 items-center flex justify-end">
            <a id="register-login-link" class="form-link" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>

            <button type="submit" id="register-button" class="submit-button">Register</button>
        </div>
    </form>
@endsection