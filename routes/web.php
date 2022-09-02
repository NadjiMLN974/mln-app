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
    return view('pages/home');
})->name('home');
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/a-propos', function () {
    return view('pages/about');
});

Route::get('/jeunes', function () {
    return view('pages/youths');
});

Route::get('/pros', function () {
    return view('pages/pros');
});

Route::get('/actu', function () {
    return view('pages/news');
});

Route::get('/offre-emploi', function () {
    return view('pages/jobs');
});

Route::get('/contact', function () {
    return view('pages/contacts');
});

