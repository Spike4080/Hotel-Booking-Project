<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // public function create()
    // {
    //     $doctors = Doctor::all();
    //     return view('bookings/create', [
    //         'doctors' => $doctors
    //     ]);
    // }

    // public function store()
    // {
    //     request()->validate([
    //         'name' => ['required'],
    //         'phone' => ['required'],
    //         'doctor_id' => ['required'],
    //         'start_time' => ['nullable']
    //     ]);

    //     $booking = new Booking();
    //     $booking->name = request('name');
    //     $booking->user_id = auth()->id();
    //     $booking->phone = request('phone');
    //     $booking->doctor_id = request('doctor_id');
    //     $booking->start_time = request('start_time');
    //     $booking->save();

    //     return redirect('/');
    // }

    public function createBook(Doctor $doctor)
    {
        return view('bookings.create', [
            'doctor' => $doctor
        ]);
    }

    public function storeBook(Doctor $doctor)
    {
        request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'phone' => ['required', 'min:3', 'max:20'],
            'start_time' => ['required']
        ]);

        $booking = new Booking();
        $booking->name = request('name');
        $booking->phone = request('phone');
        $booking->user_id = auth()->id();
        $booking->doctor_id = $doctor->id;
        $booking->start_time = request('start_time');
        $booking->save();

        return redirect('/');
    }

    public function edit(User $user, Booking $booking)
    {
        return view('user.edit-records', [
            'user' => $user,
            'booking' => $booking
        ]);
    }

    public function update(User $user, Booking $booking)
    {
        request()->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'start_time' => ['required']
        ]);

        $booking->name = request('name');
        $booking->phone = request('phone');
        $booking->start_time = request('start_time');
        $booking->user_id = auth()->id();
        $booking->save();

        return redirect('/');
    }
}
