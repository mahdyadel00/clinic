<?php

namespace Database\Seeders;

use App\Models\PriceList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PriceList::create([
            'service_name'          => 'Basic',
            'price'                 => 100,
            'description'           => 'Basic description',
        ]);
    }
}
