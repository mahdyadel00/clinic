<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'user_id'           => 1,
            'speciality'        => 'Cardiologist',
            'address'           => 'Cairo, Egypt',
            'phone'             => '12345678910',
            'experience_years'  => 5,
            'bio'               => 'Dr. Ahmed is a cardiologist with 5 years of experience in the field.',
        ]);
    }
}
