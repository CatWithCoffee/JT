<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZayavkiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/form',  [ZayavkiController::class, 'index'])->middleware(['auth', 'verified'])->name('form.index');
Route::post('/zayavki',  [ZayavkiController::class, 'index_zayavki'])->middleware(['auth', 'verified'])->name('form.index_zayavki');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
