<?php

namespace MyApp\Components\CreateInbox;

use MyApp\Components\CreateInbox\UseCase\Interactor;
use MyApp\Components\CreateInbox\UseCase\InputBoundary;
use MyApp\Components\CreateInbox\UseCase\NormalOutputBoundary;
use Illuminate\Support\ServiceProvider as AbstractServiceProvider;
use MyApp\Components\CreateInbox\UserInterface\Web\NormalPresenter;

/**
 * Class ServiceProvider
 * @package MyApp\Components\CreateInbox
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
        $this->app->bind(NormalOutputBoundary::class, NormalPresenter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/DataAccess/Database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/UserInterface/Web/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/UserInterface/Web/views', 'web');
    }
}
