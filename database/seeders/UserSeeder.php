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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin01',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123456'),
            'role'=> 0
        ]);

        DB::table('users')->insert([
            'name' => 'Agent A',
            'username' => 'agent01',
            'email' => 'agent@mail.com',
            'password' => Hash::make('agent123456'),
            'role'=> 1
        ]);

        DB::table('users')->insert([
            'name' => 'king customer',
            'username' => 'customer01',
            'email' => 'customer@mail.com',
            'password' => Hash::make('customer123456'),
            'role'=> 2
        ]);
    }
}
