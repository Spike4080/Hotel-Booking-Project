<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', [
            'users' => $users,
            'roles' => Role::all()
        ]);
    }

    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('admin.doctors', [
            'doctors' => $doctors
        ]);
    }

    public function create()
    {
        return view('admin.createDoctor');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'photo' => ['nullable'],
            'description' => ['required', 'min:10', 'max:300'],
            'address' => ['required', 'min:2', 'max:100']
        ]);

        $doctor = new Doctor();
        $doctor->name = request('name');
        $doctor->photo = '/storage/' . request('photo')->store('/doctors');
        $doctor->description = request('description');
        $doctor->address = request('address');
        $doctor->save();

        return redirect('/admin/doctors');
    }

    public function createTime()
    {
        return view('admin.createTime', [
            'doctors' => Doctor::all()
        ]);
    }

    public function storeTime()
    {
        request()->validate([
            'doctor_id' => ['required'],
            'book_time' => ['nullable'],
        ]);

        $schedule = new Schedule();
        $schedule->doctor_id = request('doctor_id');
        $schedule->book_time = request('book_time');
        $schedule->save();

        return redirect('/admin/doctors');
    }

    public function createRecord()
    {
        return view('admin.createRecord', [
            'doctors' => Doctor::all(),
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
        $bookings = Booking::all();
        return view('admin.booking', [
            'bookings' => $bookings
        ]);
    }

    public function index(User $userr)
    {
    }

    public function editRole(User $user)
    {
        $user->role_id = request('id');
        $user->save();

        return redirect('admin/users');
    }
}
