<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // если пользователь авторизован вернуть в профиль
        if (Auth::check()) {
            return redirect('/profile');
        }

        if ($request->method() == 'POST') { // если данные из форм были отправлены
            $validateFields = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (User::where('email', $validateFields['email'])->exists()) {
                redirect(route('/register'))->withErrors([
                   'email' => 'Такой пользователь уже существует!'
                ]);
            }

            $user = User::create($validateFields);
            /**
             * если все прошло успешно
             * аутентифицируем пользователя
             * и редиректим на профиль
             */
            if ($user) {
                auth()->login($user);
                return redirect('/profile');
            }
            // иначе произошла ошибка
            return redirect('/register')->withErrors([
                'formError' => 'Произошла ошибка при регистрации пользователя'
            ]);
        } else { // если пользователь только зашел на страницу
            return view('register');
        }
    }
}
