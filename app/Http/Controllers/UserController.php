<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index () {
        return view('index');
    }

    public function profile()
    {
        // если пользователь не авторизован вернуть на страницу входа
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('/profile');
    }
}
