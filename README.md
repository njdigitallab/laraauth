### Laraauth

### About

Laraauth is an authentication package for Laravel.

### Installation

Install with `composer require njdigitallab/laraauth`.

### Getting Started

There are 2 steps to getting started.

#### Step 1
Publish the package assets by running artisan command `php artisan vendor:publish --tag=laraauth-assets`.

If you want to use your own stylesheet, disable the package stylesheet by calling the Laraauth `disableStylesheet` method in your `AppServiceProvider` boot method.

```php
use NjDigitalLab\Laraauth\Laraauth;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    Laraauth::disableStylesheet();
}
```

#### Step 2

By default, laravel user migration comes with the name column only. If you want to work with first and last name instead, take the following steps:

a) Publish the package migration file with artisan command `php artisan vendor:publish --tag=laraauth-migrations`.

b) Run the `php artisan migrate` command.

c) In your `AppServiceProvider` boot method, call Laraauth `allowFirstAndLastName` method. This tells the package that we will be working with first and last name instead of name only.

```php
use NjDigitalLab\Laraauth\Laraauth;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    Laraauth::allowFirstAndLastName();
}
```

d) Update the fillable attributes on the User model.

```php
protected $fillable = [
    'first_name', 'last_name', 'email', 'password',
];
```

Ignore step a and b if you prefer to edit the Laravel default user migration file instead.

### Login

Login is available at `/login` url and needs no configuration.

### Logout

To logout, send a post request to the logout route.

```php

<a href="" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
<form method="POST" style="display: hidden;" action="{{ route('logout') }}">
    @csrf
</form>
```

### Registration

Registration is available at `/register` url. 

If you are using first name and last name instead of name only for registration, refer to step 2 in the Getting Started section.

You can disable registration by calling the Laraauth `disableRegistration` method in your `AppServiceProvider` register method.

```php
use NjDigitalLab\Laraauth\Laraauth;

/**
 * Register any application services.
 */
public function register(): void
{
    Laraauth::disableRegistration();
}
```

### Verify Email

Verify email works as per the default Laravel configuration. Just apply the `verified` middleware to the respective route and implement the `Illuminate\Contracts\Auth\MustVerifyEmail` contract on the User model.

### Forgot Password

Forgot password is available at `/forgot-password` url and need no configuration.

### Confirm Password

Confirm password works as per the default laravel configuration. Just apply the `password.confirm` middleware on the respective routes. No further configuration is needed.

### Show Site Logo

If you prefer to show a logo instead of the site name, call the Laraauth `showLogo` method in your `AppServiceProvider` boot method and pass the full url to the image file you wish to use.

```php
use NjDigitalLab\Laraauth\Laraauth;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    Laraauth::showLogo(asset('images/logo.png'));
}
```
