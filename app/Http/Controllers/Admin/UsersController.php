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
}
