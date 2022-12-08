<?php

namespace Database\Seeders;

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
        [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('admin@gmail.com'),
            'created_at' => now(),
            'updated_at' =>  now(),
        ],

        [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'is_admin' => 0,
            'password' => Hash::make('user@gmail.com'),
            'created_at' => now(),
            'updated_at' =>  now(),
        ],

        ]);
    }
}
