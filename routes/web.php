<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\VieEstudiantineController;
use Illuminate\Support\Facades\Route;

// Route principale
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes des sections principales
Route::get('/formations', [FormationController::class, 'index'])->name('formations');
Route::get('/vie-estudiantine', [VieEstudiantineController::class, 'index'])->name('vie-estudiantine');


// Routes pour les liens rapides (à implémenter plus tard)
Route::get('/acces-rapide', function() {
    return view('pages.acces-rapide');
})->name('acces-rapide');

Route::get('/observatoire', function() {
    return view('pages.observatoire');
})->name('observatoire');

Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');