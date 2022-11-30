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
        $errors = [];

        if($request->isMethod('post'))
        {
            $this->validate($request, $this->validator());

            if(Hash::check($request->post('password'), $user->password))
            {
                if($request->post('new_password')){
                    $user->fill([
                        'name' => $request->post('name'),
                        'email' => $request->post('email'),
                        'password' => Hash::make($request->post('new_password')),
                    ]);
                }else{
                    $user->fill([
                        'name' => $request->post('name'),
                        'email' => $request->post('email'),
                        'password' => Hash::make($request->post('password')),
                    ]);
                }

                if($request->file('profile_photo')){
                    $user->setAttribute('profile_photo', $request->file('profile_photo')->getClientOriginalName());
                }

                $user->save();

                if($request->file('profile_photo')){
                    $request->file('profile_photo')->storeAs('public/images/users/' . $user->id, $user->profile_photo);
                }

                return redirect()
                    ->route('profile')
                    ->with('notice', [
                            'status' => 'success',
                            'text' => 'Профиль успешно обновлен!'
                    ]);
            } else {
                $errors['password'] = 'Введен неверный пароль';
                return redirect()
                    ->route('profile')
                    ->withErrors($errors);
            }
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. Auth::id()],
            'password' => 'required',
            'new_password' => 'nullable|min:3',
            'profile_photo' => 'mimes:jpeg,bmp,png,jpg|max:2048',
        ];
    }

}
