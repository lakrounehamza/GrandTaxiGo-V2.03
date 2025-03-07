<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PassagerController;
use App\Http\Middeware\RoleMiddeware;
use  App\Http\Controllers\ChauffeurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('oauth/{provider}/redirect', [SocialiteAuthController::class, 'redirect'])->name('oauth.redirect');
Route::get('oauth/{provider}/callback', [SocialiteAuthController::class, 'authenticate']);

// Route::get('dashboard/trajets/',[AdminController::class ,'trajets']);

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard/trajets', [AdminController::class, 'trajets'])->name('listeTrajet');


    Route::get('statistic/', [AdminController::class, 'statistic'])->name('admin.statistic');
    Route::get('dashboard/users', [AdminController::class, 'users']);
    Route::get('dashboard/users/banni/{id}', [AdminController::class, 'users'])->name('user.banni');
    Route::get('dashboard/users/detail/{id}', [AdminController::class, 'detail'])->name('user.detail');
    Route::get('dashboard/users/detail/accepte/{id}', [ReservationController::class, 'accepte'])->name('resrvation.accepte');
    Route::get('dashboard/users/detail/refuse/{id}', [ReservationController::class, 'annule'])->name('reservation.annule');
    Route::get('dashboard/trajets', [AdminController::class, 'trajets'])->name('listeTrajet');
    Route::get('dashboard/trajets/accepter/{id}', [AdminController::class, 'accepter'])->name('trajet.accepter');
    Route::get('dashboard/trajets/annule/{id}', [AdminController::class, 'annule'])->name('trajet.annule');
    Route::get('dashboard/trajets/destroy/{id}', [AdminController::class, 'destroy'])->name('trajet.destroy');
    Route::get('statistic/', [AdminController::class, 'statistic'])->name('admin.statistic');
});

Route::middleware(['auth', 'role:chauffeur'])->group(function () {
    Route::get('home/reservation', [ChauffeurController::class, 'reservations'])->name('chauffeur.reservations');
    Route::get('home/trajet', [ChauffeurController::class, 'trajets'])->name('chauffeur.trajets');
    Route::get('home/reservation/annule/{id}', [ChauffeurController::class, 'annuleReservation'])->name('chauffeur.annuleReservation');
    Route::get('home/reservation/accepte/{id}', [ChauffeurController::class, 'accepte'])->name('chauffeur.accepte');
    Route::get('home/trajet/destroy/{id}', [ChauffeurController::class, 'destroy'])->name('chauffeur.destroy');
    Route::get('home/trajet/disponible/{id}', [ChauffeurController::class, 'disponible'])->name('chauffeur.disponible');
    Route::get('home/trajet/annule/{id}', [ChauffeurController::class, 'annule'])->name('chauffeur.annule');
    Route::get('trajet/create', [ChauffeurController::class, 'create'])->name('chauffeur.create');
    Route::post('trajet/store', [ChauffeurController::class, 'store'])->name('chauffeur.store');
});
Route::middleware(['auth', 'role:passager'])->group(function () {
    Route::get('home/', [ReservationController::class, 'index'])->name('passager.index');
    Route::get('create/', [ReservationController::class, 'create'])->name('passager.create');
    // Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('mesreservation',[PassagerController::class,'index'])->name('passager.reservation');
    Route::get('detail/trajet',[PassagerController::class ,'store'])->name('trajet.dtaile');
});



Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');



use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\UserInfoQRMail;

 use App\Http\Controllers\sendEmail;

Route::get('send-email', [sendEmail::class, 'sendEmail']);