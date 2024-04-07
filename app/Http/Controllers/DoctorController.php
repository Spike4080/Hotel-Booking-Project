<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $filters = [
            'search' => request('search')
        ];

        return view('doctor.doctors', [
            'doctors' => Doctor::filter($filters)->get(),
        ]);
    }

    public function detail(Doctor $doctor)
    {
        return view('doctor.detail', [
            'doctor' => $doctor
        ]);
    }
}
