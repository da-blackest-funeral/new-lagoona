<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Если страница уже редиректнулась сама на себя
        if ($request->method() == 'POST') {
            dd($request);
        } else {
            // просто образец передачи параметров в view
            // написана полная чушь
            return view('register');
//                ->with([
//                    'name' => $request->input('name'),
//                    'email' => $request->input('email'),
//                    'result' => 'succes'
//                ]);
        }
    }

    public function profile()
    {
        // если пользователь не авторизован вернуть на страницу входа
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('profile');
    }

    public function login(Request $request)
    {
        // если пользователь авторизован вернуть в профиль
        if (Auth::check()) {
            return redirect('/user/profile');
        }

        if ($request->method() == 'POST') {
            dd($request);
            // передача параметра в view
//            return view('login')->with([
//                'email' => $request->input('email')
//            ]);
        } else {
            return view('login')->with([
                'email' => 'enter email'
            ]);
        }
    }
}
