<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

/**
 * Route::match() позволяет
 * указать несколько методов
 * для отдельного адреса
 */
Route::match(
    ['get', 'post'],
    '/register',
    [RegisterController::class, 'register']
)->name('register');

Route::match(
    ['get', 'post'],
    '/login',
    [LoginController::class, 'login']
)->name('login');

/**
 * middleware('auth') означает,
 * что на эту страницу
 * могут попасть только
 * аутентифицированные пользователи
 */
Route::get(
    '/profile',
    [UserController::class, 'profile']
)->middleware('auth')
    ->name('profile');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
