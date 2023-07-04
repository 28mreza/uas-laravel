<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                'id'                => 112023001,
                'name'              => 'Muhamad Reza',
                'username'          => 'mreza',
                'email'             => 'mreza@gmail.com',
                'email_verified_at' => '2023-06-08 05:35:30',
                'akses'             => 'superadmin',
                'foto_user'         => 'zuXZt3m0tYQcqeo2tC3ZcoposhffbfEIEH1XAx7j.jpg',   
                'telepon'           => '0816557028',
                'password'          => bcrypt('1'),
                'status'            => 'aktif',
            ],
        ]);
    }
}
