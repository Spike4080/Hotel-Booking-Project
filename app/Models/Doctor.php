<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when(isset($filters['search']) && $filters['search'], function ($query) use ($filters) {
            $query->whereHas('doctor', function ($query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['search'] . '%');
            });
        });
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
