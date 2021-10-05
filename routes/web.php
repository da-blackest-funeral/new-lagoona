<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);

/**
 * Route::match() позволяет
 * указать несколько методов
 * для отдельного адреса
 */
Route::match(
    ['get', 'post'],
    '/register',
    [UserController::class, 'register']
)->name('register');

Route::match(
    ['get', 'post'],
    '/login',
    [UserController::class, 'login']
)->name('login');

/**
 * middleware('auth') означает,
 * что на эту страницу
 * могут попасть только
 * аутентифицированные пользователи
 */
Route::get(
    '/user/profile',
    [UserController::class, 'profile']
)->middleware('auth')
    ->name('profile');

//Route::get('/logout', [UserController::class, 'logout'])->name('logout');
