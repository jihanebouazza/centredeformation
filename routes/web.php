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

Route::get('/signupteacher', function () {
    return view('auth.signupTeacher');
});

Route::get('/forgotpassword', function () {
    return view('auth.forgotpassword');
});

Route::get('/newpassword', function () {
    return view('auth.newpassword');
});