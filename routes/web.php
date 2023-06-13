<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/forgotpassword', function () {
    return view('auth.forgotpassword');
});

Route::get('/newpassword', function () {
    return view('auth.newpassword');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/formations', function () {
    return view('admin.formations.manage');
});

Route::get('/formations/create', function () {
    return view('admin.formations.create');
});
Route::get('/formations/edit', function () {
    return view('admin.formations.edit');
});

Route::get('/groupes', function () {
    return view('admin.groupes.manage');
});

Route::get('/groupes/create', function () {
    return view('admin.groupes.create');
});
Route::get('/groupes/edit', function () {
    return view('admin.groupes.edit');
});

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

Route::get('/etudiants', function () {
    return view('admin.etudiants.manage');
});

Route::get('/etudiants/edit', function () {
    return view('admin.etudiants.edit');
});
Route::get('/etudiants/create', function () {
    return view('admin.etudiants.create');
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


