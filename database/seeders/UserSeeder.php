<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = DB::table('roles')->where('name', 'admin')->first();

        DB::table('users')->insert([
            'name' => 'User',
            'role' => 3,
            'email' => 'User@example.com',
            'password' => Hash::make('123456789'),  
        ]);
    }
}
