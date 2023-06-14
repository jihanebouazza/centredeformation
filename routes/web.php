<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\SearchController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/formations', [FormationController::class, 'manage']);

Route::post('/formations', [FormationController::class, 'store']);

Route::get('/formations/create', [FormationController::class, 'create']);

Route::get('/formations/{formation}/edit', [FormationController::class, 'edit']);

Route::put('/formations/{formation}', [FormationController::class, 'update']);


Route::get('/formations/{formation}/delete', [FormationController::class, 'destroy']);

Route::get('/etudiants', [EtudiantController::class, 'manage']);

Route::post('/etudiants', [EtudiantController::class, 'store']);

Route::get('/etudiants/create', [EtudiantController::class, 'create']);

Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit']);

Route::get('/groupes', [GroupeController::class, 'manage']);

Route::get('/groupes/{groupe}/delete', [GroupeController::class, 'destroy']);

Route::post('/groupes', [GroupeController::class, 'store']);

Route::get('/groupes/create', [GroupeController::class, 'create']);

Route::get('/groupes/{groupe}/edit', [GroupeController::class, 'edit']);

Route::put('/groupes/{groupe}', [GroupeController::class, 'update']);

Route::get('/dashboardE', [FormationController::class, 'index']);

Route::get('/search', [SearchController::class, 'search'])->name('search');



Route::get('/formateurs', function () {
    return view('admin.formateurs.manage');
});

Route::get('/formateurs/edit', function () {
    return view('admin.formateurs.edit');
});
Route::get('/formateurs/create', function () {
    return view('admin.formateurs.create');
});

Route::get('/candidatures', function () {
    return view('admin.candidatures.manage');
});

Route::get('/candidatures/edit', function () {
    return view('admin.candidatures.edit');
});



Route::get('/emploi', function () {
    return view('admin.emploidutemps.manage');
});

Route::get('/allformations', function () {
    return view('etudiant.formations');
});

Route::get('/showformation', function () {
    return view('etudiant.formation');
});


