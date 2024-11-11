<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::create([
            'patient_id'    => 1,
            'doctor_id'     => 1,
            'complaint'     => 'I have a headache',
            'status'        => 'new',
        ]);
    }
}
