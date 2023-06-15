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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;

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

Route::get('/login', [UserController::class, 'login'])->middleware('guest');

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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

//------------------------gestion des formations ----------------

Route::get('/formations', [FormationController::class, 'manage']);

Route::post('/formations', [FormationController::class, 'store']);

Route::get('/formations/create', [FormationController::class, 'create']);

Route::get('/formations/{formation}/edit', [FormationController::class, 'edit']);

Route::put('/formations/{formation}', [FormationController::class, 'update']);


Route::get('/formations/{formation}/delete', [FormationController::class, 'destroy']);

Route::get('/formation/{formation}', [FormationController::class, 'show']);

//------------------------gestion des etudiants ----------------


Route::get('/etudiants', [EtudiantController::class, 'manage']);

Route::post('/etudiants', [EtudiantController::class, 'store']);

Route::get('/etudiants/create', [EtudiantController::class, 'create']);

Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit']);


Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update']);

Route::get('/etudiants/{etudiant}/delete', [EtudiantController::class, 'destroy']);

Route::get('/etudiants/{etudiant}/inscrire', [EtudiantController::class, 'inscrireForm']);

Route::post('/etudiants/inscrire/{etudiant}', [EtudiantController::class, 'inscrire']);

Route::get('/groupes-by-formation/{formationId}', [EtudiantController::class, 'getGroups']);


//------------------------gestion des groupes ----------------


Route::get('/groupes', [GroupeController::class, 'manage']);

Route::get('/groupes/{groupe}/delete', [GroupeController::class, 'destroy']);

Route::post('/groupes', [GroupeController::class, 'store']);

Route::get('/groupes/create', [GroupeController::class, 'create']);

Route::get('/groupes/{groupe}/edit', [GroupeController::class, 'edit']);

Route::put('/groupes/{groupe}', [GroupeController::class, 'update']);

//------------------------gestion des formateurs ----------------


Route::get('/formateurs', [FormateurController::class, 'manage']);

Route::get('/formateurs/{formateur}/delete', [FormateurController::class, 'destroy']);

Route::post('/formateurs', [FormateurController::class, 'store']);

Route::get('/formateurs/create', [FormateurController::class, 'create']);

Route::get('/formateurs/{formateur}/edit', [FormateurController::class, 'edit']);

Route::put('/formateurs/{formateur}', [FormateurController::class, 'update']);


//---------------Emploi------------------------

Route::get('/emploi' , [EmploiController::class, 'manage']);

Route::post('/seances', [EmploiController::class, 'store']);

Route::post('/matieres', [MatiereController::class, 'store']);

Route::get('/matieres/{matiere}/delete', [MatiereController::class, 'destroy']);

Route::get('/matieres-by-groupe/{groupeId}', [MatiereController::class, 'getMatieres']);

Route::get('/get-available-time-slots', [TimeController::class, 'getAvailableTimeSlots']);

Route::get('/get-options/{type}', [EmploiController::class, 'getOptions']);

Route::post('/classes', [ClasseController::class, 'store']);

Route::get('/classes/{classe}/delete', [ClasseController::class, 'destroy']);


Route::get('/dashboardE', [FormationController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);


Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/candidatures', function () {
    return view('admin.candidatures.manage');
});

Route::get('/candidatures/edit', function () {
    return view('admin.candidatures.edit');
});





Route::get('/allformations', function () {
    return view('etudiant.formations');
});

Route::get('/showformation', function () {
    return view('etudiant.formation');
});
