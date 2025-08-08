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
        
        // Démarrer la requête pour les annonces de terrains
        $query = $category->ads()->where('is_approved', true);

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
        
        // Récupérer les annonces paginées
        $ads = $query->paginate(12);

        // Récupérer toutes les catégories pour la navbar
        $categories = Category::all();

        return view('site.terrains.index', compact('ads', 'category', 'categories'));
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