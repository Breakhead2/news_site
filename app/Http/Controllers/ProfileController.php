<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post'))
        {
            //TODO валидация, проверка на Новый пароль и на Новое фото
            return redirect()->route('profile')->with('notice', [
                        'status' => 'success',
                        'text' => 'Профиль успешно обновлен!'
            ]);
        }

        return view('profile', [
            'title' => 'Профиль',
            'user' => $user
        ]);
    }

    protected function validator(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. Auth::id()]
        ];
    }

    private function checkUser(Request $request, $user, $input): void
    {
        if(Hash::check($request->input('password'), $user->password))
        {
            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input($input)),
            ]);
        } else {
            $errors['password'] = 'Неверно введен пароль';
            redirect()->route('profile')->withErrors($errors);
        }
    }
}
