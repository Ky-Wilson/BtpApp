<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Admin\AdAppointmentController;
use App\Http\Controllers\Admin\AdGestionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdNotificationController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\Users\AdController;
use App\Http\Controllers\Users\UDashboardController;
use App\Http\Controllers\Users\UsRatingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Route::get('/', [AccueilController::class, 'index'])->name('bienvenue');

Auth::routes();


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
     // Liste des utilisateurs
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    // Formulaire de modification d'un utilisateur
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    // Traitement de la mise à jour d'un utilisateur
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    // Suppression d'un utilisateur
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    // Formulaire de création d'un utilisateur
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    // Enregistrement d'un nouvel utilisateur
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    // Route manquante pour afficher le profil d'un utilisateur
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    // Routes pour la gestion des catégories
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

     // Gestion des annonces par l'admin
    Route::get('/ads', [AdGestionController::class, 'index'])->name('admin.ads.index');
    Route::get('/ads/{ad}', [AdGestionController::class, 'show'])->name('admin.ads.show'); // Nouvelle route
    Route::put('/ads/{ad}/approve', [AdGestionController::class, 'approve'])->name('admin.ads.approve');
    Route::delete('/ads/{ad}', [AdGestionController::class, 'destroy'])->name('admin.ads.destroy'); 

     Route::get('/notifications/users', [NotificationController::class, 'index'])->name('notifications.users.index');
    Route::put('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

    // Routes pour les notifications d'annonces
    Route::get('/notifications/ads', [AdNotificationController::class, 'index'])->name('notifications.ads.index');
    Route::put('/notifications/ads/{id}/read', [AdNotificationController::class, 'markAsRead'])->name('notifications.ads.read');

    // Route pour les statistiques des utilisateurs
    Route::get('/admin/stats', [UserController::class, 'stats'])->name('admin.stats.index');

    // Route pour la liste des rendez-vous
    Route::get('/rdv', [AdAppointmentController::class, 'index'])->name('admin.appointments.index');
});


// Routes pour les utilisateurs connectés
Route::middleware('auth')->group(function () {
 Route::get('/dashboard', [UDashboardController::class, 'index'])->name('users.dashboard');
    Route::get('/ads', [AdController::class, 'index'])->name('users.ads.index');
    Route::get('/ads/create', [AdController::class, 'create'])->name('users.ads.create');
    Route::post('/ads', [AdController::class, 'store'])->name('users.ads.store');
    Route::get('/ads/{ad}', [AdController::class, 'show'])->name('users.ads.show'); // Nouvelle route
    Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('users.ads.edit');
    Route::put('/ads/{ad}', [AdController::class, 'update'])->name('users.ads.update');
    Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->name('users.ads.destroy');

    // Route pour lister toutes les notes de toutes les annonces
    Route::get('/ratings', [UsRatingController::class, 'index'])->name('users.ratings.index');
    // Route pour afficher les notes d'une annonce
    Route::get('/ads/{adId}/ratings', [UsRatingController::class, 'showRatings'])->name('users.ads.ratings');
});


// Route pour afficher les annonces de terrains
Route::get('terrains', [TerrainController::class, 'index'])->name('terrains.index');
// Route pour afficher les détails d'un terrain
Route::get('/terrains/{ad}', [TerrainController::class, 'show'])->name('terrains.show');


// Route pour afficher les annonces de maisons
Route::get('maisons', [MaisonController::class, 'index'])->name('maisons.index');
// Route pour afficher les détails d'un terrain
Route::get('/maisons/{ad}', [MaisonController::class, 'show'])->name('maisons.show');


// Route pour afficher les annonces de immeubles
Route::get('immeubles', [ImmeubleController::class, 'index'])->name('immeubles.index');
// Route pour afficher les détails d'un immeuble
Route::get('/immeubles/{ad}', [ImmeubleController::class, 'show'])->name('immeubles.show');



// Route pour afficher les annonces de bureaux
Route::get('bureaux', [BureauController::class, 'index'])->name('bureaux.index');
// Route pour afficher les détails d'un bureaux
Route::get('/bureau/{ad}', action: [BureauController::class, 'show'])->name('bureaux.show');



// Route pour afficher les annonces d'appartement
Route::get('appartements', [AppartementController::class, 'index'])->name('appartements.index');
// Route pour afficher les détails d'un bureaux
Route::get('/appartements/{ad}', action: [AppartementController::class, 'show'])->name('appartements.show');


// Route pour le formulaire de notation
Route::get('/noter', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/noter', [RatingController::class, 'store'])->name('ratings.store');

// Route pour récupérer les annonces d'une entreprise via AJAX
Route::get('/api/entreprises/{user}/annonces', [RatingController::class, 'getAdsByUser']);

Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
