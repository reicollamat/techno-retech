<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //         Paginator::defaultView('views.vendor.pagination.tailwind');
        //        Paginator::useTailwind();
        //        Paginator::defaultView('pagination::bootstrap-5');
    }
}
