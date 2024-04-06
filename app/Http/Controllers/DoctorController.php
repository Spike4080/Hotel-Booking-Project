<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.doctors', [
            'doctors' => Doctor::all()
        ]);
    }

    public function detail(Doctor $doctor)
    {
        return view('doctor.detail', [
            'doctor' => $doctor
        ]);
    }
}
