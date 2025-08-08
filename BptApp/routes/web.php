<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\AdController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdGestionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Users\UDashboardController;





Route::get('/', function () {
    return view('site.accueil');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    Route::delete('/ads/{ad}', [AdGestionController::class, 'destroy'])->name('admin.ads.destroy'); // Nouvelle route
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
});