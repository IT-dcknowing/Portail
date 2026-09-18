<?php

use Illuminate\Support\Facades\Route;
use Modules\Time\Http\Controllers\TimeController;
use Modules\Time\Http\Controllers\OvertimeController;
use Modules\Time\Http\Controllers\AbsenceController;

// Routes pour les entreprises
Route::middleware(['auth', 'maintenance'])->prefix('company')->name('company.')->group(function () {
    // Gestion des temps de travail (à mettre à jour si nécessaire)
    Route::prefix('times.absences')->name('times.absences.')->group(function () {
        Route::get('index', [AbsenceController::class, 'index'])->name('index');
        Route::get('create', [AbsenceController::class, 'create'])->name('create');
        Route::post('store', [AbsenceController::class, 'store'])->name('store');
        Route::get('show/{id}', [AbsenceController::class, 'show'])->name('show');
        Route::get('edit/{id}', [AbsenceController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [AbsenceController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [AbsenceController::class, 'destroy'])->name('destroy');
        Route::delete('remove-document/{id}', [AbsenceController::class, 'removeDocument'])->name('remove-document');
        Route::put('update-status/{id}', [AbsenceController::class, 'updateStatus'])->name('update-status');
    });
 
    // Gestion des heures supplémentaires (Nouvelle implémentation)
    Route::prefix('times.overtime')->name('times.overtime.')->group(function () {
        // Routes accessibles à tous les utilisateurs authentifiés
        Route::middleware(['auth'])->group(function () {
            // Tableau de bord et liste des heures supplémentaires
            Route::get('/', [OvertimeController::class, 'index'])->name('index');
            
            // Exportation des données
            Route::get('/export', [OvertimeController::class, 'export'])->name('export');
            
            // Visualisation d'une heure supplémentaire
            Route::get('/{id}', [OvertimeController::class, 'show'])->name('show');
            
            // Routes protégées par les permissions
            Route::middleware(['permission:time::overtime.manage'])->group(function () {
                // Création d'une nouvelle heure supplémentaire
                Route::post('/', [OvertimeController::class, 'store'])->name('store');
                
                // Édition d'une heure supplémentaire
                Route::get('/{id}/edit', [OvertimeController::class, 'edit'])->name('edit');
                Route::put('/{id}', [OvertimeController::class, 'update'])->name('update');
                
                // Suppression d'une heure supplémentaire
                Route::delete('/{id}', [OvertimeController::class, 'destroy'])->name('destroy');
                
                // Marquer comme payé
                Route::post('/{id}/mark-as-paid', [OvertimeController::class, 'markAsPaid'])
                    ->name('mark-as-paid')
                    ->middleware('permission:time::overtime.mark_as_paid');
            });
        });
    });
});

// Routes API pour les appels AJAX
Route::middleware(['auth', 'maintenance', 'permission:time::overtime.manage'])
    ->prefix('api/time')
    ->name('api.time.')
    ->group(function () {
        // Routes pour les heures supplémentaires
        Route::prefix('overtime')->group(function () {
            // Récupérer les détails d'une heure supplémentaire
            Route::get('/{id}', [OvertimeController::class, 'show'])->name('overtime.show');
            
            // Mettre à jour le statut
            Route::put('/{id}/status', [OvertimeController::class, 'updateStatus'])->name('overtime.update-status');
            
            // Marquer comme payé
            Route::post('/{id}/mark-as-paid', [OvertimeController::class, 'markAsPaid'])
                ->name('overtime.mark-as-paid');
        });
    });
