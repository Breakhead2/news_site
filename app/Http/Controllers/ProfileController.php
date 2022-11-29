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
            if(is_null($request->input('new_password'))){
                $this->validate($request, $this->validator());
                $this->validate($request, ['password' => 'required']);
                $this->checkUser($request, $user, 'password');
            }else{
                $this->validate($request, $this->validator());
                $this->validate($request, ['new_password' => ['required','string','min:3']]);
                $this->checkUser($request, $user, 'new_password');
            }

            $user->save();

            return redirect()
                ->route('profile')
                ->with('notice', [
                'status' => 'success',
                'text' => 'Профиль успешно обнавлен!'
            ]);
        }

        return view('auth.register', [
            'title' => 'Профиль',
            'user' => $user
        ]);
    }

    protected function validator(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. Auth::id()],
        ];
    }

    private function checkUser(Request $request, $user, $input): void
    {
        if(Hash::check($request->input('password'), $user->password))
        {
            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input($input))
            ]);
        } else {
            $errors['password'] = 'Неверно введен пароль';
            redirect()->route('profile')->withErrors($errors);
        }
    }
}
