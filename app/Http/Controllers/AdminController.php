<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;

class AdminController extends Controller
{
    public function insertDoctorsWithRole1()
    {
        $users = User::where('role_id', 1)->get();

        foreach ($users as $user) {
            $doctor = new Doctor();
            $doctor->id = $user->id;
            $doctor->save();
        }
    }
    public function createTime(User $user)
    {
        return view('admin.createTime', [
            'doctor' => Doctor::where('name', $user->name)->first()
        ]);
    }

    public function indexTime()
    {
        return view('admin.schedule');
    }

    public function storeTime(Doctor $doctor)
    {
        request()->validate([
            'book_time' => ['required'],
        ]);

        $schedule = new Schedule();
        $schedule->book_time = request('book_time');
        $schedule->doctor_id = $doctor->id;
        $schedule->save();


        return redirect('/');
    }

    public function createRecord(User $user)
    {
        $user_id = $user->id;
        $doctor = Doctor::where('name', $user->name)->first();
        @dd($user->id, $doctor->id);

        $medicalRecords = MedicalRecord::where('user_id', $user_id)
            ->where('doctor_id', $doctor->id)
            ->get();

        @dd($medicalRecords);
        // Error
        return view('admin.createRecord', [
            'users' => User::all()
        ]);
    }

    public function storeRecord()
    {
        request()->validate([
            'doctor_id' => ['required'],
            'user_id' => ['required'],
            'treatment' => ['required', 'min:3', 'max:200'],
            'date' => ['required'],
        ]);

        $medicalRecord = new MedicalRecord();
        $medicalRecord->doctor_id = request('doctor_id');
        $medicalRecord->user_id = request('user_id');
        $medicalRecord->treatment = request('treatment');
        $medicalRecord->date = request('date');
        $medicalRecord->save();

        return redirect('/admin/users');
    }

    public function showRecords()
    {
        return view('admin/medicalRecords', [
            'medicalRecords' => MedicalRecord::all()
        ]);
    }

    public function showBook()
    {
        $doctor = Doctor::where('name', auth()->user()->name)->first();
        return view('admin.booking', [
            'bookings' => Booking::where('doctor_id', $doctor->id)->get()
        ]);
    }

    public function editRole(User $user)
    {
        $user->role_id = request('id');
        $user->save();

        return redirect('admin/users');
    }

    public function show(User $user)
    {
        $doctor = Doctor::where('name', $user->name)->first();
        return view('admin.profile', [
            'doctor' => $doctor
        ]);
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.editProfile', [
            'doctor' => $doctor
        ]);
    }

    public function store(Doctor $doctor)
    {
        request()->validate([
            'description' => ['required'],
            'address' => ['required']
        ]);

        $doctor->description = request('description');
        $doctor->name = auth()->user()->name;
        $doctor->role_id = auth()->user()->role_id;
        $doctor->address = request('address');
        $doctor->photo = '/storage/' . request('photo')->store('/doctors', 'public');
        $doctor->save();

        return redirect('/admin/medicalRecords');
    }

    public function acceptBook(Booking $booking)
    {
        $booking->update(['status' => true]);
    }
}
