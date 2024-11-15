<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Database\Seeders\MajorSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            AppointmentSeeder::class,
            SettingSeeder::class,
            DoctorScheduleShiftSeeder::class,
            UserScheduleSeeder::class,
            RoomSeeder::class,
            WaitingReservationSeeder::class,
            PriceListSeeder::class,

        ]);
    }
}
