<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
    //
    
    /**
     * Affiche toutes les annonces de la catégorie 'immeuble'.
     */
    public function index(Request $request)
    {
        // Récupérer la catégorie 'immeuble'
        $category = Category::where('name', 'immeuble')->firstOrFail();

        // Démarrer la requête pour les annonces principales, triées par les plus récentes
        $query = $category->ads()->where('is_approved', true)->latest();

         // Récupération des annonces pour le carrousel (3 aléatoires)
        $carousel_ads = $category->ads()->where('is_approved', true)->inRandomOrder()->limit(3)->get();

        // Appliquer le filtre de localisation si un terme de recherche est présent
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Appliquer le filtre par nombre de pièces si un paramètre est présent dans la requête
        if ($request->has('pieces')) {
            switch ($request->pieces) {
                case '1':
                    $query->where('nombre_de_pieces', 1);
                    break;
                case '2-3':
                    $query->whereBetween('nombre_de_pieces', [2, 3]);
                    break;
                case '4+':
                    $query->where('nombre_de_pieces', '>=', 4);
                    break;
            }
        }

        // Récupérer les 12 dernières annonces paginées
        $ads = $query->paginate(12);

        // Récupérer une collection distincte de toutes les annonces non filtrées pour la section "vedette"
        $featured_ads = $category->ads()->where('is_approved', true)->latest()->paginate(12);

        // Récupérer toutes les catégories pour la navbar
        $categories = Category::all();

        return view('site.immeubles.index', compact('ads', 'featured_ads', 'category', 'categories', 'carousel_ads'));
    }

    /**
     * Affiche les détails d'une annonce spécifique.
     */
    public function show(Ad $ad)
    {
        // Récupérer toutes les catégories pour la navbar
        $categories = Category::all();
// Incrémente le compteur de vues de l'annonce
        $ad->increment('views_count');
        return view('site.immeubles.show', compact('ad', 'categories'));
    }
}
