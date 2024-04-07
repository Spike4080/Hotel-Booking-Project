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
        $doctor = Doctor::where('name', auth()->user()->name)->first();
        $schedules = Schedule::where('doctor_id', $doctor->id)->get();
        return view('admin.schedule', [
            'schedules' => $schedules
        ]);
    }

    public function editTime(Schedule $schedule)
    {
        return view('admin.editSchedule', [
            'schedule' => $schedule
        ]);
    }

    public function updateTime(Schedule $schedule)
    {
        $schedule->update(['book_time' => request('book_time')]);

        return redirect('/admin/Schedule');;
    }

    public function deleteTime(Schedule $schedule)
    {
        $schedule->delete();
        return redirect('/admin/Schedule');
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


        return redirect('/admin/Schedule');
    }

    public function createRecord(User $user)
    {
        $doctor = Doctor::where('name', $user->name)->first();
        $users = User::where('role_id', 2)->get();
        $medicalRecords = MedicalRecord::where('doctor_id', $doctor->id)->get();
        return view('admin.createRecord', [
            'medicalRecords' => $medicalRecords,
            'doctor' => $doctor,
            'users' => $users

        ]);
    }

    public function storeRecord()
    {

        request()->validate([
            'user_id' => ['required'],
            'treatment' => ['required', 'min:3', 'max:200'],
        ]);

        $medicalRecord = new MedicalRecord();
        $medicalRecord->doctor_id = Doctor::where('name', auth()->user()->name)->first()->id;
        $medicalRecord->user_id = request('user_id');
        $medicalRecord->treatment = request('treatment');
        $medicalRecord->date = now();
        $medicalRecord->save();

        return redirect('/admin/medicalRecords');
    }

    public function showRecords()
    {
        $doctor = Doctor::where('name', auth()->user()->name)->first();
        $medicalRecords = MedicalRecord::where('doctor_id', $doctor->id)->get();
        return view('admin.medicalRecords', [
            'medicalRecords' => $medicalRecords
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
        return back();
    }

    public function denyBook(Booking $booking)
    {
        $booking->update(['status' => false]);
        return back();
    }
}
