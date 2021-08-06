<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/post', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('post');

require __DIR__ . '/auth.php';
