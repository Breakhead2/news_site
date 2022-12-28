<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->where('id', '!=', Auth::user()->id)
            ->paginate(10);

        return view('admin.users', [
            'title' => 'Пользователи',
            'users' => $users
        ]);
    }

    public function switchRole(Request $request)
    {
        $user = User::query()->where('id', '=', $request->id)->first();

        if (Auth::id() != $user->id) {
            $user->is_admin = !$user->is_admin;
            $user->save();
        }
        return response()->json(['isAdmin'=>$user->is_admin]);
    }
}
