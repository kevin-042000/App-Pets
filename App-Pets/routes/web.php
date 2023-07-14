<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LostPetController;
use App\Http\Controllers\FoundPetController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::view('/login', 'pages.login');
Route::view('/register', 'pages.register');
Route::post('/register', [LoginController::class, 'register'])->name('login.register');
// Route de registro

// Route de informacion
Route::get('/info', [InfoController::class, 'index'])->name('info.index');
// Route de Lost Pets
Route::get('/lost-pets', [LostPetController::class, 'index'])->name('lost-pets.index');
Route::post('/lost-pets', [LostPetController::class, 'store'])->name('lost-pets.store');
Route::get('/lost-pets/edit/{pet}', [LostPetController::class, 'edit'])->name('lost-pets.edit');
Route::put('/lost-pets/update/{pet}', [LostPetController::class, 'update'])->name('lost-pets.update');
// Route::get('/lost-pets/show/{pet}', [LostPetController::class, 'show'])->name('lost-pets.show');
Route::delete('/lost-pets/destroy/{pet}', [LostPetController::class, 'destroy'])->name('lost-pets.destroy');
// Route de Found Pets
Route::get('/found-pets/register', [FoundPetController::class, 'index'])->name('found-pets.index');
Route::post('/found-pets', [LostPetController::class, 'store'])->name('found-pets.store');
Route::get('/found-pets/edit/{pet}', [LostPetController::class, 'edit'])->name('found-pets.edit');
Route::put('/found-pets/update/{pet}', [LostPetController::class, 'update'])->name('found-pets.update');
Route::delete('/found-pets/destroy/{pet}', [LostPetController::class, 'destroy'])->name('found-pets.destroy');
// Route de Profile User
Route::post('/user-profile', [UserProfileController::class, 'store'])->name('user-profile.store');
