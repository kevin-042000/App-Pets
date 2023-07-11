<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/lost-pets/register', [LostPetController::class, 'index'])->name('lost-pets.index');
Route::post('/lost-pets', [LostPetController::class, 'store'])->name('lost-pets.store');
Route::get('/found-pets/register', [FoundPetController::class, 'index'])->name('found-pets.index');
Route::post('/found-pets', [FoundPetController::class, 'store'])->name('found-pets.store');
Route::post('/user-profile', [UserProfileController::class, 'store'])->name('user-profile.store');
