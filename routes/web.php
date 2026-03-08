<?php

use NjDigitalLab\Laraauth\Controllers\ConfirmPasswordController;
use NjDigitalLab\Laraauth\Controllers\EmailVerificationController;
use NjDigitalLab\Laraauth\Controllers\ForgotPasswordController;
use NjDigitalLab\Laraauth\Controllers\LoginController;
use NjDigitalLab\Laraauth\Controllers\LogoutController;
use NjDigitalLab\Laraauth\Controllers\RegisterController;
use NjDigitalLab\Laraauth\Controllers\ResetPasswordController;
use NjDigitalLab\Laraauth\Facades\Laraauth;

Route::middleware(Laraauth::getGuestMiddlewares())->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'view'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    // Register
    Route::get('register', [RegisterController::class, 'view'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    // Forgot Password
    Route::get('forgot-password', [ForgotPasswordController::class, 'view'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'email'])->name('password.email');

    // Reset Password
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'view'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.store');
});

Route::middleware(Laraauth::getAuthMiddlewares())->group(function () {
    // Verify Email
    Route::get('verify-email', [EmailVerificationController::class, 'notice'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationController::class, 'email'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Confirm Password
    Route::get('confirm-password', [ConfirmPasswordController::class, 'view'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm');

    // Logout
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});
