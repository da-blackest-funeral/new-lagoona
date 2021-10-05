<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

Route::get('/', [MainController::class, 'index']);

Route::match(
    ['get', 'post'],
    '/register',
    [UserController::class, 'register']
);

Route::get(
    '/user/{id}/profile',
    [UserController::class, 'mainPage']
)->name('profile');

Route::match(
    ['get', 'post'],
    '/auth',
    [UserController::class, 'auth']
);
