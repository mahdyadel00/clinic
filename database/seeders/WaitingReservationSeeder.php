<?php

namespace Database\Seeders;

use App\Models\WaitingReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaitingReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WaitingReservation::create([
            'patient_id'        => 1,
            'room_id'           => 1,
            'doctor_id'         => 1,
            'reservation_time'  => now(),
            'status'            => 'waiting',
        ]);
    }
}
