<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchTagController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', SearchTagController::class);

Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

    Route::delete('/logout', [SessionController::class, 'destroy']);
});
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});
