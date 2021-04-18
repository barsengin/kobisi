<?php

namespace App\Providers;

use App\Repositories\CompanyRepositories;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // BIND TO SERVICE CONTAINER
        $this->app->bind(
            CompanyRepositoryInterface::class,
            CompanyRepositories::class
        );
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
