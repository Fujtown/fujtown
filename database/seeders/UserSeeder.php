<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_name' => 'admin123',
                'user_email' => 'tech@fujtown.com',
                'user_pswd' => Hash::make('Fujtown1234!'),
                'user_fname' => 'Admin',
                'user_address' => 'Fujairah, UAE',
                'user_phone' => '0507345364',
                'user_city' => 'Fujairah',
                'user_country' => 'UAE',
                'user_status' => 1,
                'user_ac_status' => 1,
            ]
        ]);
    }
}
