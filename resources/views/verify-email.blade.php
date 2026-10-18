@extends('laraauth::layouts.auth')

@section('title', 'Verify Email')

@section('content')
    <div class="mt-4 flex items-center justify-between">
        <form id="verify-email-form" class="auth-form" method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="laraauth-message">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

             @if (session('status') == 'verification-link-sent')
                <div class="laraauth-status">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="button-container">
                <a id="verify-email-link" class="form-link" onclick="document.getElementById('logout-form').submit();" href="">
                    {{ __('Log Out') }}
                </a>

                <button type="submit" class="submit-button">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form class="hidden" id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
    </div>
@endsection