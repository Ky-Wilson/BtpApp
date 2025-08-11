<?php

namespace App\Providers;

use App\Models\Ad;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFive(); // Utilisez Bootstrap 5 par exemple

        View::share('pendingAds', Ad::where('is_approved', false)->count());

    }
}
