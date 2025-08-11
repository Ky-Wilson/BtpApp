<?php

namespace App\Http\Controllers\Users;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsRatingController extends Controller
{
    /**
     * Affiche toutes les notes de toutes les annonces.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ads = Ad::with('ratings')->get();
        
        return view('users.ratings.index', compact('ads'));
    }
     /**
     * Affiche les notes pour une annonce spécifique.
     *
     * @param  int  $adId
     * @return \Illuminate\View\View
     */
    public function showRatings($adId)
    {
        $ad = Ad::with('ratings')->findOrFail($adId);
        
        return view('users.ratings.show', compact('ad'));
    }
}
