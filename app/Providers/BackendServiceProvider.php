<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\ProductRepositoryInterface',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Repositories\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
        );
    }
}
