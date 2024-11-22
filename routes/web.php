<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

Route::resource('category', CategoryController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('todo', TodoController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy', 'create'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
