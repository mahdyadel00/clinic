<?php

namespace Database\Seeders;

use App\Models\UserSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSchedule::create([
            'user_id'       => 1,
            'shift_day'     => '2024-11-10',
            'start_time'    => '08:00:00',
            'end_time'      => '16:00:00',
        ]);
    }
}
