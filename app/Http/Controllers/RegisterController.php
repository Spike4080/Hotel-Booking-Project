<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('/register.create');
    }
    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:2', 'max:30'],
            'username' => ['required', 'min:2', 'max:30'],
            'email' => ['required', 'email', 'max:40'],
            'password' => ['required', 'confirmed', 'min:2', 'max:30'],
            'role_id' => ['nullable']
        ]);

        $user = new User;
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->role_id = auth()->user()->role_id ?? 3;
        $user->save();

        return redirect('/');
    }
}
