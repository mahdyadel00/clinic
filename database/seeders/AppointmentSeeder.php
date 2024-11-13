<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
            'patient_id'       => 1,
            'doctor_id'        => 1,
            'appointment_date' => now()->addDays(2),
            'description'      => 'I have a headache',
            'status'           => 'pending',
        ]);
    }
}
