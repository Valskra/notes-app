<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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
Route::middleware(['auth'])->group(function () {

    Route::resource('notes', NoteController::class);

    Route::get('/notes/{note}/duplicate', [NoteController::class, 'duplicate'])->name('notes.duplicate');
    Route::patch('/notes/{note}/toggle-favorite', [NoteController::class, 'toggleFavorite'])->name('notes.toggle-favorite');
    Route::get('/notes/category/{category}', [NoteController::class, 'byCategory'])->name('notes.category');
    Route::get('/search', [NoteController::class, 'search'])->name('notes.search');

    Route::prefix('api')->group(function () {
        Route::delete('/notes/{note}', [NoteController::class, 'apiDestroy'])->name('api.notes.destroy');
        Route::patch('/notes/{note}/quick-update', [NoteController::class, 'quickUpdate'])->name('api.notes.quick-update');
    });
});

Route::get('/public/note/{uuid}', [NoteController::class, 'showPublic'])->name('notes.public');



require __DIR__ . '/auth.php';
