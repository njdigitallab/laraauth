### Laraauth

### About

Laraauth is an authentication package for Laravel.

### Installation

Install with composer `composer require njdigitallab/laraauth`.

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

Login is available at `/login` url.

### Registration

Registration is available at `/register` url. 

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

### Showing Site Logo

If you prefer to show a logo instead of the site name, call the Laraauth `showLogo` method in your `AppServiceProvider` file and pass the full path to the image file you wish to use.

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
