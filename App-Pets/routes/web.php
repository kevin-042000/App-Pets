<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LostPetController;
use App\Http\Controllers\FoundPetController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;

// Rutas sin proteccion

// Route de registro
Route::view('/register', 'pages.register')->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('login.register');
// Route login
Route::view('/login', 'pages.login')->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');
// Route de informacion
Route::get('/info', [InfoController::class, 'index'])->name('info.index');


//Rutas protegidas por la autentificacion
Route::middleware('auth')->group(function (){

// Route de home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route de Lost Pets
Route::get('/lost-pets', [LostPetController::class, 'index'])->name('lost-pets.index');
Route::post('/lost-pets', [LostPetController::class, 'store'])->name('lost-pets.store');
Route::get('/lost-pets/edit/{pet}', [LostPetController::class, 'edit'])->name('lost-pets.edit');
Route::put('/lost-pets/update/{pet}', [LostPetController::class, 'update'])->name('lost-pets.update');
Route::delete('/lost-pets/destroy/{pet}', [LostPetController::class, 'destroy'])->name('lost-pets.destroy');

// Route de Found Pets
Route::get('/found-pets', [FoundPetController::class, 'index'])->name('found-pets.index');
Route::post('/found-pets', [FoundPetController::class, 'store'])->name('found-pets.store');
Route::get('/found-pets/edit/{pet}', [FoundPetController::class, 'edit'])->name('found-pets.edit');
Route::put('/found-pets/update/{pet}', [FoundPetController::class, 'update'])->name('found-pets.update');
Route::delete('/found-pets/destroy/{pet}', [FoundPetController::class, 'destroy'])->name('found-pets.destroy');

// Route de Profile User
Route::get('/profile', [UserProfileController::class, 'index'])->name('user-profile.index');
Route::post('/profile', [UserProfileController::class, 'store'])->name('user-profile.store');
Route::get('/profile/{user}/edit', [UserProfileController::class, 'edit'])->name('user-profile.edit');
Route::put('/profile/{id}', [UserProfileController::class, 'update'])->name('user-profile.update');
Route::delete('/profile/{id}/destroy', [UserProfileController::class, 'destroy'])->name('user-profile.destroy');

});