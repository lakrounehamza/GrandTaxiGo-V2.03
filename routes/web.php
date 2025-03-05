<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\AdminController;
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
Route::get('dashboard/trajets',[AdminController::class ,'trajets']);
require __DIR__.'/auth.php';
