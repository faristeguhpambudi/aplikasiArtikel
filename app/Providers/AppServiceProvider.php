<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Illuminate Paginator
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
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
        // Paginator Bootstrap
        Paginator::useBootstrap();
    }
}
