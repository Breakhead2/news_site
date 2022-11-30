<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post'))
        {
            $user = User::query()->where('id', '=', $request->input('id'))->first();

            if(Auth::id() != $user->id){
                $user->is_admin = !$user->is_admin;
                $user->save();

                return redirect()
                    ->route('admin.users')
                    ->with('notice', [
                        'status' => 'success',
                        'text' => 'Роль успешно измена!'
                    ]);
            }else{
                return redirect()
                    ->route('admin.users')
                    ->with('notice', [
                        'status' => 'warning',
                        'text' => 'Нельзя поменять права у самого себя!'
                    ]);
            }
        }

        $users = User::query()
            ->where('id', '!=', Auth::user()->id)
            ->paginate(10);

        return view('admin.users', [
            'title' => 'Пользователи',
            'users' => $users
        ]);
    }
}
