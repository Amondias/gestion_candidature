<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MessageController;

// Page publique d'accueil
Route::get('/', function () {
    return view('index');
})->name('accueil');

// Groupe des routes accessibles uniquement après authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Redirection selon le rôle actif
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role_actif === 'demandeur') {
            return redirect()->route('demandeur.dashboard');
        } elseif ($user->role_actif === 'offreur') {
            return redirect()->route('offreur.dashboard');
        }
        return view('index');
    })->name('dashboard');

    // Tableau de bord pour chaque rôle
    Route::get('/demandeur/dashboard', [DemandeController::class, 'dashboard'])->name('demandeur.dashboard');
    Route::get('/offreur/dashboard', [OffreController::class, 'dashboard'])->name('offreur.dashboard');

    // Routes DEMANDES (demandeur)
    Route::prefix('demande')->name('demande.')->group(function () {
        Route::get('/dashboard', [DemandeController::class, 'dashboard'])->name('dashboard');
        Route::get('/create', [DemandeController::class, 'create'])->name('create');
        Route::post('/store', [DemandeController::class, 'store'])->name('store');
        Route::get('/mes', [DemandeController::class, 'mesDemandes'])->name('mes');
        Route::get('/{demande}', [DemandeController::class, 'show'])->name('show');
        Route::get('/{demande}/edit', [DemandeController::class, 'edit'])->name('edit');
        Route::put('/{demande}', [DemandeController::class, 'update'])->name('update');
        Route::delete('/{demande}', [DemandeController::class, 'destroy'])->name('destroy');
    });

    // Routes OFFRES (offreur)
    Route::prefix('offre')->name('offre.')->group(function () {
        Route::get('/dashboard', [OffreController::class, 'dashboard'])->name('dashboard');
        Route::get('/create', [OffreController::class, 'create'])->name('create');
        Route::post('/store', [OffreController::class, 'store'])->name('store');
        Route::get('/mes', [OffreController::class, 'mesOffres'])->name('mes');
        Route::get('/{offre}', [OffreController::class, 'show'])->name('show');
        Route::get('/{offre}/edit', [OffreController::class, 'edit'])->name('edit');
        Route::put('/{offre}', [OffreController::class, 'update'])->name('update');
        Route::delete('/{offre}', [OffreController::class, 'destroy'])->name('destroy');
    });

    // Routes MESSAGES (tous utilisateurs connectés)
    Route::prefix('messages')->name('messages.')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::post('/send', [MessageController::class, 'send'])->name('send');
    });

    Route::post('/follow/toggle', [FollowController::class, 'toggleFollow'])->name('follow.toggle');
    Route::get('/mes-suivis', [FollowController::class, 'myFollows'])->name('follow.my');
    Route::get('/suivi-pour-moi', [FollowController::class, 'followsForMe'])->name('follow.for_me');
});
