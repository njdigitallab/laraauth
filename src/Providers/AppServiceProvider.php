<?php

namespace NjDigitalLab\Laraauth\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laraauth');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../public/' => public_path('vendor/laraauth')
            ], 'laraauth-assets');

            $this->publishesMigrations([
                __DIR__.'/../../database/migrations' => database_path('migrations'),
            ], 'laraauth-migrations');
        }
    }
}
