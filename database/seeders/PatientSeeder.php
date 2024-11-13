<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'user_id'       => 1,
            'dob'           => '1990-01-01',
            'gender'        => 1,
            'phone'         => '0123456789',
            'address'       => '123 Main St, Hometown, USA',
            'medical_history' => 'None',
        ]);
    }
}
