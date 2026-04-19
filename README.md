### Laraauth

### About

Laraauth is an authentication package for Laravel.

### Installation

Install with composer `composer require njdigitallab/laraauth`.

### Getting Started

Publish the package assets by running command `php artisan vendor:publish --tag=laraauth-assets`.

If you want to use your own stylesheet, disable the package stylesheet by calling the `disableStylesheet` method on the Laraauth facade in your `AppServiceProvider` boot method.

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

By default, laravel user migration comes with the name column only. If you want to work with first and last name instead, take the following steps:

1) Publish the package migration file with artisan command `php artisan vendor:publish --tag=laraauth-migrations`.

2) Run the `php artisan migrate` command.

3) In your `AppServiceProvider` file boot method, call Laraauth facade `allowFirstAndLastName` static method. This tells the package that we will be working with first and last name instead of name only.

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
Ignore step #1 and #2 if you prefer to edit the Laravel default user migration file instead.