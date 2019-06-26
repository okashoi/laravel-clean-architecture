<?php

namespace MyApp\Web;

use Illuminate\Support\ServiceProvider as AbstractServiceProvider;
use MyApp\Components\Tasks\UseCases\CreateInbox\InputBoundary;
use MyApp\Components\Tasks\UseCases\CreateInbox\Interactor;
use MyApp\Components\Tasks\UseCases\CreateInbox\NormalOutputBoundary;
use MyApp\Web\Presenters\CreateInbox\Presenter;

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
        $this->app->bind(InputBoundary::class, Interactor::class);

        $this->app->bind(NormalOutputBoundary::class, Presenter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'web');
    }
}
