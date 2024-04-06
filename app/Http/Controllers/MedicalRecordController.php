<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function show(User $user)
    {
        $medicalRecord = MedicalRecord::where('user_id', $user->id)->get();
        return view('user.medicalRecords', [
            'medicalRecord' => $medicalRecord
        ]);
    }
}
