<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        Blade::if('admin', function () {
            return auth()->user()->isAdmin();
        });
        Blade::if('resident', function () {
            return auth()->user()->isResident();
        });

        Blade::if('imbestigador', function () {
            return auth()->user()->isImbestigador();
        });
    }
}
