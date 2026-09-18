<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CGAController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\RadiationController;
use App\Http\Controllers\ActesJuridiquesController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ContactController;
use Modules\LandingPage\Http\Controllers\LandingPageController;


Route::get('/test-landing', function () {
    return view('landingpage::index');
});
 Route::get('/', [\Modules\LandingPage\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage.index');
 
Route::get('/creation', [CreationController::class, 'index'])->name('services.creation');
Route::post('/creation', [CreationController::class, 'store'])->name('storeSociete');

Route::get('/cga', [CGAController::class, 'index'])->name('services.cga');
Route::post('/cga/store', [CGAController::class, 'store'])->name('storeCGA');

Route::get('/modification', [ModificationController::class, 'index'])->name('services.modification');
Route::post('/modification', [ModificationController::class, 'store'])->name('storeModification');

Route::get('/juridique', [ActesJuridiquesController::class, 'index'])->name('services.juridique');

Route::get('/radiation', [RadiationController::class, 'index'])->name('services.radiation');
Route::post('/radiation', [RadiationController::class, 'store'])->name('storeRadiation');

// Soumission de devis
Route::post('/quote/submit', [QuoteController::class, 'submit'])->name('quote.submit');

// Pré-inscription Formation
Route::post('/formation/submit', [FormationController::class, 'submit'])->name('formation.submit');

// Formulaire de contact
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

use App\Models\Plan;

Route::get('/nos-offres', function () {
    $plans = Plan::where('is_active', 1)->get();
      return view('offre', compact('plans'));
})->name('services.offres');

Route::get('/formation', function () {
    return view('formation');
})->name('services.formation');

//  Route::get('/', function() {
//     return 'Laravel fonctionne !';
// });
// Routes des notifications (accessibles à tous les utilisateurs authentifiés)
Route::middleware(['auth'])->group(function () {
    
    // (Route CGA déplacée hors du middleware auth pour les visiteurs non connectés)
    /*
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/unread', [NotificationController::class, 'unread'])->name('notifications.unread');
    Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');

    // Actions AJAX
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::patch('/notifications/{notification}/unread', [NotificationController::class, 'markAsUnread'])->name('notifications.mark-unread');
    Route::patch('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('/notifications/ajax/unread', [NotificationController::class, 'getUnread'])->name('notifications.ajax.unread');
    Route::get('/notifications/stats', [NotificationController::class, 'stats'])->name('notifications.stats');
    */
    Route::get('/simulateur', [LandingPageController::class, 'simulateur'])
    ->name('simulateur');

    // Simulateur
    Route::get('/simulateur', [LandingPageController::class, 'simulateur'])->name('simulateur');

    // Formulaire de contact
    Route::post('/contact', [LandingPageController::class, 'contact'])->name('contact');
});


// Soumission de devis
Route::post('/quote/submit', [QuoteController::class, 'submit'])->name('quote.submit');

Route::get('/test-mail', function () {
    $recipients = ['infos@dc-knowing.com', 'williamskouassi525@gmail.com', 'alexkoffi@dc-knowing.com', 'dc-knowing@gmail.com'];
    try {
        Mail::raw('Test email from DC-KNOWING portal — DEBUG', function ($mail) use ($recipients) {
            $mail->to($recipients)->subject('Test SMTP DC-KNOWING');
        });
        return "Email test envoyé avec succès aux 4 adresses ! Vérifiez vos boîtes aux lettres.";
    } catch (\Exception $e) {
        return "Erreur SMTP : " . $e->getMessage();
    }
});


// Routes pour les allowances (web interface)
Route::middleware(['auth'])->group(function () {
    /*
    // Options d'allocation
    Route::resource('allowance-options', AllowanceOptionController::class)->except(['show']);

    // Allocations
    Route::resource('allowances', AllowanceController::class)->except(['show']);
    Route::get('allowances/employee/{employeeId}', [AllowanceController::class, 'getByEmployee'])->name('allowances.by-employee');
    Route::get('allowances/{allowance}/print', [AllowanceController::class, 'print'])->name('allowances.print');
    */
});

if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}


