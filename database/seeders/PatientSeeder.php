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
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'dob'           => '2024-11-10',
            'phone'         => '1234567890',
            'email'         => ' john@email.com',
            'address'       => '123 Main St',
            'gender'        => 1,
        ]);
    }
}
