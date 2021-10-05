<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register (Request $request) {

        // Если страница уже редиректнулась сама на себя
        if ($request->method() == 'POST') {
            dd($request);
        } else {
            // просто образец передачи параметров в view
            // нет обработки логики авторизации
            return view('register')
                ->with([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'result' => 'succes'
                ]);
        }
    }

    public function mainPage() {
        // return view('main_page');
    }
}
