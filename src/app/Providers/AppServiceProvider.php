<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MyApp\Components\Tasks\UseCases\IdProvider;
use MyApp\Database\Repositories\AutoIncrementTaskIdProvider;
use MyApp\Components\Tasks\UseCases\TaskRepository as TaskRepositoryInterface;
use MyApp\Database\Repositories\TaskRepository;

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
