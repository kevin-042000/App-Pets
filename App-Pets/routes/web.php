<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LostPetController;
use App\Http\Controllers\FoundPetController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/info', [InfoController::class, 'index'])->name('info.index');
Route::get('/lost-pets/register', [LostPetController::class, 'index'])->name('lost-pets.index');
Route::post('/lost-pets', [LostPetController::class, 'store'])->name('lost-pets.store');
Route::get('/lost-pets/edit/{pet}', [LostPetController::class, 'edit'])->name('lost-pets.edit');
Route::put('/lost-pets/update/{pet}', [LostPetController::class, 'update'])->name('lost-pets.update');
// Route::get('/lost-pets/show/{pet}', [LostPetController::class, 'show'])->name('lost-pets.show');
Route::delete('/lost-pets/destroy/{pet}', [LostPetController::class, 'destroy'])->name('lost-pets.destroy');
Route::get('/found-pets/register', [FoundPetController::class, 'index'])->name('found-pets.index');
Route::post('/found-pets', [FoundPetController::class, 'store'])->name('found-pets.store');
Route::post('/user-profile', [UserProfileController::class, 'store'])->name('user-profile.store');
