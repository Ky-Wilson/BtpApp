<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentAds = Ad::with('user')->latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();
        
        $currentMonthAds = Ad::whereMonth('created_at', now()->month)
                               ->whereYear('created_at', now()->year)
                               ->count();
        
        $previousMonthAds = Ad::whereMonth('created_at', now()->subMonth()->month)
                                ->whereYear('created_at', now()->subMonth()->year)
                                ->count();

        $adsPercentageChange = 0;
        if ($previousMonthAds > 0) {
            $adsPercentageChange = (($currentMonthAds - $previousMonthAds) / $previousMonthAds) * 100;
        }

        // Calcul du nombre d'utilisateurs du mois en cours
        $currentMonthUsers = User::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count();

        // Calcul du nombre d'utilisateurs du mois précédent
        $previousMonthUsers = User::whereMonth('created_at', now()->subMonth()->month)
                                ->whereYear('created_at', now()->subMonth()->year)
                                ->count();
        
        // Calcul du pourcentage de changement des utilisateurs
        $usersPercentageChange = 0;
        if ($previousMonthUsers > 0) {
            $usersPercentageChange = (($currentMonthUsers - $previousMonthUsers) / $previousMonthUsers) * 100;
        }

        return view('admin.dashboard', compact('recentAds', 'recentUsers', 'currentMonthAds', 'adsPercentageChange', 'currentMonthUsers', 'usersPercentageChange'));
    }
}