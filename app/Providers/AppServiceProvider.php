<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        // Pagination
        Paginator::useBootstrap();

        // Data shared by all views
        View::share('title', 'Malipo App',);
        View::share('company_name', 'TIFA Research');
        View::share('authors', 'Project inherited from Davis Too for TIFA Research, enriched and maintained by Kenneth Kipchumba under Supervision and Guidance from Kelvin Masika');
    }
}
