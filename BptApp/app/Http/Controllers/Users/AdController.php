<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Affiche la liste des annonces de l'utilisateur connecté.
     */
    public function index()
    {
        $ads = Ad::where('user_id', Auth::id())->with('category')->get();
        return view('users.ads.index', compact('ads'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        $categories = Category::all();
        return view('users.ads.create', compact('categories'));
    }

    /**
     * Enregistre une nouvelle annonce.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:à vendre,à louer,vendu',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string|max:255',
            'surface' => 'nullable|string|max:255',
            'nombre_de_pieces' => 'nullable|integer',
            'equipements' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimetypes:video/mp4,video/avi,video/mpeg|max:20000',
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx|max:10000',
            'whatsapp_link' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['is_approved'] = false;

        $validatedData['images'] = $this->uploadFiles($request, 'images', 'ads/images');
        $validatedData['videos'] = $this->uploadFiles($request, 'videos', 'ads/videos');
        $validatedData['documents'] = $this->uploadFiles($request, 'documents', 'ads/documents');

        Ad::create($validatedData);

        return redirect()->route('users.ads.index')->with('success', 'Annonce créée et en attente de validation.');
    }
    /**
     * Affiche une annonce spécifique.
     */
    public function show(Ad $ad)
    {
        // Ne permet d'accéder à l'annonce que si elle est approuvée OU si l'utilisateur est le propriétaire.
        if (!$ad->is_approved && $ad->user_id !== Auth::id()) {
            abort(404);
        }
        
        $ad->load('user', 'category');
        return view('users.ads.show', compact('ad'));
    }
    /**
     * Affiche le formulaire de modification.
     */
    public function edit(Ad $ad)
    {
        // Vérifie si l'utilisateur est bien le propriétaire de l'annonce
        if ($ad->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::all();
        return view('users.ads.edit', compact('ad', 'categories'));
    }

    /**
     * Met à jour une annonce.
     */
    public function update(Request $request, Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:à vendre,à louer,vendu',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string|max:255',
            'surface' => 'nullable|string|max:255',
            'nombre_de_pieces' => 'nullable|integer',
            'equipements' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimetypes:video/mp4,video/avi,video/mpeg|max:20000',
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx|max:10000',
            'whatsapp_link' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
        ]);
        
        $validatedData['images'] = array_merge($ad->images ?? [], $this->uploadFiles($request, 'images', 'ads/images'));
        $validatedData['videos'] = array_merge($ad->videos ?? [], $this->uploadFiles($request, 'videos', 'ads/videos'));
        $validatedData['documents'] = array_merge($ad->documents ?? [], $this->uploadFiles($request, 'documents', 'ads/documents'));

        $ad->update($validatedData);

        return redirect()->route('users.ads.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    /**
     * Supprime une annonce.
     */
    public function destroy(Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
            abort(403);
        }

        // Suppression des fichiers du stockage
        foreach ($ad->images ?? [] as $image) {
            Storage::disk('public')->delete($image);
        }
        foreach ($ad->videos ?? [] as $video) {
            Storage::disk('public')->delete($video);
        }
        foreach ($ad->documents ?? [] as $document) {
            Storage::disk('public')->delete($document);
        }

        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Annonce supprimée avec succès.');
    }

    /**
     * Helper pour l'upload de fichiers.
     */
    private function uploadFiles(Request $request, string $fileType, string $path): array
    {
        $uploadedPaths = [];
        if ($request->hasFile($fileType)) {
            foreach ($request->file($fileType) as $file) {
                $uploadedPaths[] = $file->store($path, 'public');
            }
        }
        return $uploadedPaths;
    }
}