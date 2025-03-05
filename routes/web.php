<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PassagerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('oauth/{provider}/redirect', [SocialiteAuthController::class,'redirect'])->name('oauth.redirect');
Route::get('oauth/{provider}/callback', [SocialiteAuthController::class,'authenticate']);
Route::get('dashboard/users',[AdminController::class ,'users']);
Route::get('dashboard/users/banni/{id}',[AdminController::class ,'users'])->name('user.banni');
Route::get('dashboard/users/detail/{id}',[AdminController::class ,'detail'])->name('user.detail');
Route::get('dashboard/users/detail/accepte/{id}',[ReservationController::class ,'accepte'])->name('resrvation.accepte');
Route::get('dashboard/users/detail/refuse/{id}',[ReservationController::class ,'annule'])->name('reservation.annule');
Route::get('dashboard/trajets',[AdminController::class ,'trajets'])->name('listeTrajet');
Route::get('dashboard/trajets/accepter/{id}',[AdminController::class ,'accepter'])->name('trajet.accepter');
Route::get('dashboard/trajets/annule/{id}',[AdminController::class ,'annule'])->name('trajet.annule');
Route::get('dashboard/trajets/destroy/{id}',[AdminController::class ,'destroy'])->name('trajet.destroy');
Route::get('statistic/',[AdminController::class,'statistic'])->name('admin.statistic');
// Route::get('dashboard/trajets/',[AdminController::class ,'trajets']);
Route::get('home/',[ReservationController::class,'index'])->name('passager.index');
Route::get('create/',[ReservationController::class,'create'])->name('passager.create');
require __DIR__.'/auth.php';
