<?php

use Illuminate\Support\Facades\Route;

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
    return view('layout');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/signup', function () {
    return view('auth.signup');
});

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

Route::get('/candidatures', function () {
    return view('admin.candidatures.manage');
});

Route::get('/candidatures/edit', function () {
    return view('admin.candidatures.edit');
});