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

            if($request->input('role') == '0'){
                $user->is_admin = 1;
            }else{
                $user->is_admin = 0;
            }

            $user->save();

            return redirect()
                ->route('admin.users')
                ->with('notice', [
                    'status' => 'success',
                    'text' => 'Роль успешно измена!'
                ]);

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