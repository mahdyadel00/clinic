<?php

namespace Database\Seeders;

use App\Models\DoctorScheduleShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorScheduleShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DoctorScheduleShift::create([
            'doctor_id'     => 1,
            'shift_day'     => 'Monday',
            'start_time'    => '08:00:00',
            'end_time'      => '16:00:00',
        ]);
    }
}
