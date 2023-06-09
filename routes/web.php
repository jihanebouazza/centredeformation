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
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\OpinionController;

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


Route::get('/candidature', [CandidatureController::class, 'single']);

Route::post('/candidature/store', [CandidatureController::class, 'store'])->name('candidatures.store');



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


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);

//--------------------------------------------------Etudiant
Route::get('/dashboardE', [FormationController::class, 'index'])->middleware(['auth', 'etudiant']);




Route::get('/search', [SearchController::class, 'search'])->name('search');

// opinions
Route::get('/opinions', [OpinionController::class, 'index'])->middleware(['auth', 'etudiant']);

Route::post('/opinions', [OpinionController::class, 'store'])->middleware(['auth', 'etudiant']);

Route::get('/opinions/create', [OpinionController::class, 'create'])->middleware(['auth', 'etudiant']);

Route::get('/opinions/{opinion}/edit', [OpinionController::class, 'edit'])->middleware(['auth', 'etudiant']);

Route::put('/opinions/{opinion}', [OpinionController::class, 'update'])->middleware(['auth', 'etudiant']);

Route::get('/opinions/{opinion}/delete', [OpinionController::class, 'destroy'])->middleware(['auth', 'etudiant']);




// ------------------------------------------ Paiement

Route::post('/checkout/{id_formation}', [PaiementController::class, 'checkout'])->middleware(['auth', 'etudiant'])->name('checkout');
Route::get('/success', [PaiementController::class, 'success'])->middleware(['auth', 'etudiant'])->name('checkout.success');
Route::get('/cancel', [PaiementController::class, 'cancel'])->middleware(['auth', 'etudiant'])->name('checkout.cancel');
// ------------------ history
Route::get('/history', [InscriptionController::class, 'index'])->middleware(['auth', 'etudiant']);

//------------------------------certificat

Route::get('/certificates/{id}', [CertificatController::class, 'generateCertificate'])->middleware(['auth', 'etudiant'])->name('generate.certificate');

//---------------------profile

Route::get('/profileE', [UserController::class, 'edit'])->middleware(['auth', 'etudiant']);
Route::put('/update_profile', [UserController::class, 'update'])->middleware(['auth', 'etudiant']);

//----------------------------------------------Formateur
Route::get('/dashboardF', [FormateurController::class, 'emploi'] )->middleware(['auth', 'formateur']);
Route::get('/emploiE', [EtudiantController::class, 'emploi'])->middleware(['auth', 'etudiant']);
Route::get('/passwordE', [UserController::class, 'passwordformE'])->middleware(['auth', 'etudiant']);

Route::put('/password', [UserController::class, 'changePassword'])->middleware('auth');

Route::get('/passwordF', [UserController::class, 'passwordformF'] )->middleware(['auth', 'formateur']);