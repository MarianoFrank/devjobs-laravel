<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsRecruiter;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name("home");


Route::middleware(['auth', 'verified', IsRecruiter::class])->group(function () {
    Route::get('/offers', [OfferController::class, 'index'])->name('dashboard');
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
    Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
    Route::get('/candidates/{offer}', [CandidateController::class, 'index'])->name('candidates.index');
    //Notifications
    Route::get("/notifications", NotificationController::class)->name("notifications");
});
Route::get('/offers/{offer}', [OfferController::class, 'show'])->name('offers.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
