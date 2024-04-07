<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $user = auth()->user();
        return view('user.profile', [
            'user' => $user
        ]);
    }
    public function show()
    {
        return view('user.records');
    }
    public function editProfile(User $user)
    {
        return view('user.edit-profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(User $user)
    {
        request()->validate([
            'name' => ['required', 'min:2', 'max:30'],
            'photo' => ['nullable', 'image'],
            'username' => ['required', 'min:2', 'max:30'],
            'email' => ['required', 'email', 'max:40'],
            'password' => ['required', 'confirmed', 'min:2', 'max:30'],
            'role_id' => ['nullable']
        ]);

        $user->name = request('name');
        $user->photo = '/storage/' . request('photo')->store('/users');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->role_id = auth()->user()->role_id ?? 2;
        $user->photo = '/storage/' . request('photo')->store('/users', 'public');
        $user->save();

        return redirect('/users/user/profile');
    }

    public function deleteProfile(User $user)
    {
        $user->delete();
        return redirect('/login');
    }

    public function showRecord(User $user)
    {
        return view('user.records', [
            'bookings' => Booking::where('user_id', $user->id)->get()
        ]);
    }
}
