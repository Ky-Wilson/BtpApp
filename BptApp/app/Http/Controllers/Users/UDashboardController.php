<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UDashboardController extends Controller
{
   /**
     * Affiche le tableau de bord de l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Statistiques des annonces
        $totalAds = $user->ads()->count();
        $pendingAds = $user->ads()->where('is_approved', false)->count();

        // Annonces du mois
        $currentMonthAds = $user->ads()->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $previousMonthAds = $user->ads()->whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();
        $adsPercentageChange = ($previousMonthAds > 0) ? (($currentMonthAds - $previousMonthAds) / $previousMonthAds) * 100 : 0;

        // Taux d'approbation
        $adsApprovalRate = ($totalAds > 0) ? (($totalAds - $pendingAds) / $totalAds) * 100 : 0;
        
        // Données pour les tableaux
        $recentAds = $user->ads()->latest()->take(5)->get();
        $latestRatings = Rating::whereHas('ad', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('ad')->latest()->take(3)->get();
        
        // Annonces les plus populaires (basé sur le nombre de rendez-vous)
        $popularAds = $user->ads()->withCount('appointments')->orderBy('appointments_count', 'desc')->take(5)->get();

        return view('users.dashboard', compact(
            'totalAds',
            'pendingAds',
            'adsApprovalRate',
            'currentMonthAds',
            'adsPercentageChange',
            'recentAds',
            'latestRatings',
            'popularAds'
        ));
    }
}
