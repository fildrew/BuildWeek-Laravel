<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/books');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/books', \App\Http\Controllers\BookController::class)->middleware(['auth', 'verified']);

Route::resource('/authors', \App\Http\Controllers\AuthorController::class)->middleware(['auth', 'verified']);

Route::resource('/users', \App\Http\Controllers\UserManageController::class)->middleware(['auth', 'verified']);

Route::resource('/reservations', \App\Http\Controllers\ReservationController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
