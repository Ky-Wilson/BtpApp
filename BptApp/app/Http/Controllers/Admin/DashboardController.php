<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\User;
use App\Models\Rating;
use App\Http\Controllers\Controller;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        // Données existantes
        $recentAds = Ad::with('user')->latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();
        $latestRatings = Rating::latest()->take(3)->get();
        
        $currentMonthAds = Ad::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $previousMonthAds = Ad::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        $adsPercentageChange = ($previousMonthAds > 0) ? (($currentMonthAds - $previousMonthAds) / $previousMonthAds) * 100 : 0;

        $currentMonthUsers = User::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $previousMonthUsers = User::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        $usersPercentageChange = ($previousMonthUsers > 0) ? (($currentMonthUsers - $previousMonthUsers) / $previousMonthUsers) * 100 : 0;

        // Nouveaux KPI
        $totalUsers = User::count();
        $totalAds = Ad::count();
        $pendingAds = Ad::where('is_approved', false)->count();

        $adsApprovalRate = ($totalAds > 0) ? ($totalAds - $pendingAds) / $totalAds * 100 : 0;

        // Annonces les plus populaires (basé sur le nombre de rendez-vous)
        $popularAds = Ad::withCount('appointments')->orderBy('appointments_count', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'recentAds',
            'latestRatings',
            'recentUsers',
            'currentMonthAds',
            'adsPercentageChange',
            'currentMonthUsers',
            'usersPercentageChange',
            'totalUsers',
            'totalAds',
            'pendingAds',
            'adsApprovalRate',
            'popularAds'
        ));
    }
}