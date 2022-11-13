<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use function view;

class LoginController extends Controller
{
    public function login()
    {
        return view ('auth.login', [
            'title' => 'Вход'
        ]);
    }
}
