<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts.index');
});

Route::get('/register', [RegisterController::class, 'index']);