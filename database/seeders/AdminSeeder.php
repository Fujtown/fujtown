<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'user_name' => 'admin',
                'user_email' => 'admin@fujtown.com',
                'user_pswd' => Hash::make('admin123'),
                'user_fname' => 'Administrator',
                'user_address' => 'Fujtown Admin Office',
                'user_phone' => '123456789',
                'user_city' => 'Fujairah',
                'user_country' => 'UAE',
                'user_status' => 1,
                'user_ac_status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
