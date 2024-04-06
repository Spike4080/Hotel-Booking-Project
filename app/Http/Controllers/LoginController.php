<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }
    public function store()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', request('email'))->first();

        if ($user) {
            if (Hash::check(request('password'), $user->password)) {
                auth()->login($user);
                return redirect('/');
            } else {
                return back()->withErrors([
                    'password' => 'Wrong Password'
                ]);
            }
        } else {
            return back()->withErrors([
                'email' => 'Invalid Email'
            ]);
        }
    }
}
