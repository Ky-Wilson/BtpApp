<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdGestionController extends Controller
{
/**
     * Affiche la liste de toutes les annonces, y compris celles en attente d'approbation.
     */
    public function index()
    {
        $ads = Ad::with('user', 'category')->orderBy('is_approved', 'asc')->get();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Affiche une annonce spécifique pour l'administrateur.
     */
    public function show(Ad $ad)
    {
        $ad->load('user', 'category');
        return view('admin.ads.show', compact('ad'));
    }

    /**
     * Approuve une annonce spécifique.
     */
    public function approve(Ad $ad)
    {
        $ad->is_approved = true;
        $ad->save();

        return redirect()->route('admin.ads.index')->with('success', 'Annonce approuvée avec succès.');
    }

    /**
     * Rejette (supprime) une annonce.
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('admin.ads.index')->with('success', 'Annonce rejetée et supprimée.');
    }
}
