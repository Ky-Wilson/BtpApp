<?php

namespace App\Providers;

use App\Models\Ad;
use Illuminate\Support\Facades\View; // Importation correcte de la façade
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('layouts.admin.inc.admin-sidebar', function ($view) {

            $pendingAds = Ad::where('is_approved', false)->count();
            $view->with('pendingAds', $pendingAds);
        });
    }
}