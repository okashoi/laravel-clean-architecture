<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MyApp\Components\CreateInbox\UseCase\IdProvider;
use MyApp\Components\CreateInbox\DataAccess\Database\Repositories\TaskRepository;
use MyApp\Components\CreateInbox\UseCase\TaskRepository as TaskRepositoryInterface;
use MyApp\Components\CreateInbox\DataAccess\Database\Repositories\AutoIncrementTaskIdProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IdProvider::class, AutoIncrementTaskIdProvider::class);

        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
