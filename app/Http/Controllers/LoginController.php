<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {

        if (Auth::check()) {
            return redirect('/' . Auth::user()->id . '/profile');
        }

        if ($request->method() == 'POST') {

            $formFields = $request->only(['email', 'password']);
            if (Auth::attempt($formFields)) {
                return redirect('/' . Auth::user()->id . '/profile');
            }
        } else {
            return view('/login');
        }

        return redirect('/login')->withErrors([
           'login' => 'Не удалось авторизоваться'
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
