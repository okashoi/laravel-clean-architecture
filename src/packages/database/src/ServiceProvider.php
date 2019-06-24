<?php

namespace MyApp\Database;

use Illuminate\Support\ServiceProvider as AbstractServiceProvider;

/**
 * Class ServiceProvider
 * @package MyApp\Database
 */
class ServiceProvider extends AbstractServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
