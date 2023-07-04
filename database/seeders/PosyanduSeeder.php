<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Posyandu;

class PosyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Posyandu::insert([
            [
                'idposyandu'        => 1001,
                'namaposyandu'      => 'melati',
                'alamatposyandu'    => 'kp. batukarut',
                'teleponposyandu'   => '0816557001',
            ],
            [
                'idposyandu'        => 1002,
                'namaposyandu'      => 'delima',
                'alamatposyandu'    => 'kp. sayang',
                'teleponposyandu'   => '0816557002',
            ],
            [
                'idposyandu'        => 1003,
                'namaposyandu'      => 'mawar',
                'alamatposyandu'    => 'kp. panyocokan',
                'teleponposyandu'   => '0816557003',
            ],
        ]);
    }
}
