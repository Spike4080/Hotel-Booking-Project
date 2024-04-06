<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'id' => 1
        ]);
        Role::create([
            'name' => 'doctor',
            'id' => 2
        ]);
        Role::create([
            'name' => 'user',
            'id' => 3
        ]);
    }
}
