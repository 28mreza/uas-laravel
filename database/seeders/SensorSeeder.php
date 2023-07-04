<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Sensor::insert([
            [
                'idsensor'  => 1,
                'tinggi'    => 0,
                'berat'     => 0,
            ],
        ]);
    }
}
