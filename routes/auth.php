<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Routes d'Authentification
|--------------------------------------------------------------------------
|
| Ces routes gèrent l'authentification pour tous les types d'utilisateurs
| du système RH Flow (Super Admin, Entreprise, HR, Paie, Employé)
|
*/

// Routes d'authentification (accessibles à tous)
Route::middleware('guest')->group(function () {
    // Route d'accueil principale - Module LandingPage
    Route::get('/', [\Modules\LandingPage\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage.index');

    // Connexion
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // Mot de passe oublié
    Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [LoginController::class, 'sendResetLink'])->name('password.email');

    // Réinitialisation de mot de passe
    Route::get('/reset-password/{code}', [LoginController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password/{code}', [LoginController::class, 'resetPassword'])->name('password.update');
});

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {
    // Déconnexion
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
