<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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


                if ($user->role_id == 1) {
                    $doctorExists = Doctor::where('name', $user->name)->exists();

                    if (!$doctorExists) {
                        // If a Doctor entry doesn't exist, create one
                        $doctor = new Doctor();
                        $doctor->name = $user->name;
                        $doctor->role_id = $user->role_id;
                        $doctor->save();
                    }
                }

                // Log in the user
                auth()->login($user);
                return redirect('/');
            } else {
                // Invalid password
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
