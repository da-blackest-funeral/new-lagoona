<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index () {
        return view('index');
    }

    public function profile($id)
    {
        // если пользователь не авторизован возрващаем его на страницу входа
        if (!Auth::check()) {
            return redirect('/login');
        }
        // Если пользователь попытается перейти на приватную часть (возможно чужой) страницы
        if (Auth::user()->id == $id) {
            return view('profile', ['id' => Auth::user()->id]);
        }

        return "You don't have permissions to do this.";
    }
}
