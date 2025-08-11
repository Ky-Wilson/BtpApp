<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ad;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {
        // Récupère toutes les entreprises ayant des annonces
        $companies = User::whereHas('ads')->get();
        return view('site.ratings.create', compact('companies'));
    }

    public function getAdsByUser(User $user)
    {
        // Retourne les annonces d'une entreprise au format JSON
        return response()->json($user->ads);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'contact' => 'nullable|string|max:255',
            'score' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        
        $ad = Ad::find($validatedData['ad_id']);

        Rating::create([
            'ad_id' => $ad->id,
            'user_id' => $ad->user_id, // L'ID de l'entreprise
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'score' => $validatedData['score'],
            'comment' => $validatedData['comment'],
        ]);

        return redirect()->route('ratings.create')->with('success', 'Merci pour votre avis !');
    }
}