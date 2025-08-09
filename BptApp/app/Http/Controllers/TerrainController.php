<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    /**
     * Affiche toutes les annonces de la catégorie 'terrain'.
     */
    public function index(Request $request)
    {
        // Récupérer la catégorie 'terrain'
        $category = Category::where('name', 'terrain')->firstOrFail();

        // Démarrer la requête pour les annonces principales, triées par les plus récentes
        $query = $category->ads()->where('is_approved', true)->latest();

         // Récupération des annonces pour le carrousel (3 aléatoires)
        $carousel_ads = $category->ads()->where('is_approved', true)->inRandomOrder()->limit(3)->get();

        // Appliquer le filtre de localisation si un terme de recherche est présent
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Appliquer le filtre de prix si un paramètre est présent dans la requête
        if ($request->has('price_range')) {
            switch ($request->price_range) {
                case 'low':
                    $query->where('price', '<', 500000);
                    break;
                case 'medium':
                    $query->whereBetween('price', [500001, 1200000]);
                    break;
                case 'high':
                    $query->whereBetween('price', [1200001, 1800000]);
                    break;
                case 'very_high':
                    $query->where('price', '>', 2000000);
                    break;
            }
        }

        // Récupérer les 12 dernières annonces paginées
        $ads = $query->paginate(12);

        // Récupérer une collection distincte de toutes les annonces non filtrées pour la section "vedette"
        $featured_ads = $category->ads()->where('is_approved', true)->latest()->paginate(12);

        // Récupérer toutes les catégories pour la navbar
        $categories = Category::all();

        return view('site.terrains.index', compact('ads', 'featured_ads', 'category', 'categories', 'carousel_ads'));
    }

    /**
     * Affiche les détails d'une annonce spécifique.
     */
    public function show(Ad $ad)
    {
        // Récupérer toutes les catégories pour la navbar
        $categories = Category::all();

        return view('site.terrains.show', compact('ad', 'categories'));
    }
}