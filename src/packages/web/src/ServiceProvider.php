<?php

namespace MyApp\Web;

use Illuminate\Support\ServiceProvider as AbstractServiceProvider;

/**
 * Class ServiceProvider
 * @package MyApp\Web
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
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}
