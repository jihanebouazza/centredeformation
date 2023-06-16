<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CandidatureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});
//------------------------authentification----------------

Route::get('/signup', [UserController::class, 'register'])->middleware('guest');

Route::post('/signup', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


Route::post('/auth', [UserController::class, 'auth'])->middleware('guest');

Route::get('/user/verify', [UserController::class, 'verify'])->middleware('guest');

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/forget', [UserController::class, 'forgetform'])->middleware('guest');

Route::post('/users/forget', [UserController::class, 'forget'])->middleware('guest');

Route::get('/reset', [UserController::class, 'resetform'])->middleware('guest');

Route::post('/users/reset', [UserController::class, 'reset'])->middleware('guest');


Route::get('/candidature', function () {
    return view('auth.candidature');
});


//------------------------gestion des formations ----------------

Route::get('/formations', [FormationController::class, 'manage'])->middleware(['auth', 'admin']);

Route::post('/formations', [FormationController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/formations/create', [FormationController::class, 'create'])->middleware(['auth', 'admin']);

Route::get('/formations/{formation}/edit', [FormationController::class, 'edit'])->middleware(['auth', 'admin']);

Route::put('/formations/{formation}', [FormationController::class, 'update'])->middleware(['auth', 'admin']);


Route::get('/formations/{formation}/delete', [FormationController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/formation/{formation}', [FormationController::class, 'show']);

//------------------------gestion des etudiants ----------------


Route::get('/etudiants', [EtudiantController::class, 'manage'])->middleware(['auth', 'admin']);

Route::post('/etudiants', [EtudiantController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/etudiants/create', [EtudiantController::class, 'create'])->middleware(['auth', 'admin']);

Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->middleware(['auth', 'admin']);


Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->middleware(['auth', 'admin']);

Route::get('/etudiants/{etudiant}/delete', [EtudiantController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/etudiants/{etudiant}/inscrire', [EtudiantController::class, 'inscrireForm'])->middleware(['auth', 'admin']);

Route::post('/etudiants/inscrire/{etudiant}', [EtudiantController::class, 'inscrire'])->middleware(['auth', 'admin']);

Route::get('/groupes-by-formation/{formationId}', [EtudiantController::class, 'getGroups'])->middleware(['auth', 'admin']);


//------------------------gestion des groupes ----------------


Route::get('/groupes', [GroupeController::class, 'manage'])->middleware(['auth', 'admin']);

Route::get('/groupes/{groupe}/delete', [GroupeController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::post('/groupes', [GroupeController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/groupes/create', [GroupeController::class, 'create'])->middleware(['auth', 'admin']);

Route::get('/groupes/{groupe}/edit', [GroupeController::class, 'edit'])->middleware(['auth', 'admin']);

Route::put('/groupes/{groupe}', [GroupeController::class, 'update'])->middleware(['auth', 'admin']);

//------------------------gestion des formateurs ----------------


Route::get('/formateurs', [FormateurController::class, 'manage'])->middleware(['auth', 'admin']);

Route::get('/formateurs/{formateur}/delete', [FormateurController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::post('/formateurs', [FormateurController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/formateurs/create', [FormateurController::class, 'create'])->middleware(['auth', 'admin']);

Route::get('/formateurs/{formateur}/edit', [FormateurController::class, 'edit'])->middleware(['auth', 'admin']);

Route::put('/formateurs/{formateur}', [FormateurController::class, 'update'])->middleware(['auth', 'admin']);


//---------------Emploi------------------------

Route::get('/emploi', [EmploiController::class, 'manage'])->middleware(['auth', 'admin']);

Route::post('/seances', [EmploiController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/seances/{seance}/delete', [EmploiController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/seances/{seance}/edit', [EmploiController::class, 'edit'])->middleware(['auth', 'admin']);

Route::put('/seances/{seance}', [EmploiController::class, 'update'])->middleware(['auth', 'admin']);

Route::post('/matieres', [MatiereController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/matieres/{matiere}/delete', [MatiereController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/matieres-by-groupe/{groupeId}', [MatiereController::class, 'getMatieres'])->middleware(['auth', 'admin']);

Route::get('/get-available-time-slots', [TimeController::class, 'getAvailableTimeSlots'])->middleware(['auth', 'admin']);

Route::get('/get-options/{type}', [EmploiController::class, 'getOptions'])->middleware(['auth', 'admin']);

Route::post('/classes', [ClasseController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/classes/{classe}/delete', [ClasseController::class, 'destroy'])->middleware(['auth', 'admin']);



//-------------------------------------------------- candidature

Route::get('/candidatures', [CandidatureController::class, 'manage'])->middleware(['auth', 'admin']);

Route::get('/candidatures/{candidature}/show', [CandidatureController::class, 'show'])->middleware(['auth', 'admin']);

Route::get('/candidatures/{candidature}/accept', [CandidatureController::class, 'accept'])->middleware(['auth', 'admin']);

Route::get('/candidatures/{candidature}/refuse', [CandidatureController::class, 'destroy'])->middleware(['auth', 'admin']);



//--------------------------------------------------
Route::get('/dashboardE', [FormationController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);


Route::get('/search', [SearchController::class, 'search'])->name('search');



// ------------------------------------------ Paiement

Route::post('/checkout/{id_formation}', [PaiementController::class, 'checkout'])->name('checkout');
Route::get('/success', [PaiementController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [PaiementController::class, 'cancel'])->name('checkout.cancel');
