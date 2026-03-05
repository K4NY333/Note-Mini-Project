<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username'   => 'user1',
                'email'      => 'user1@example.com',
                'password'   => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'user2',
                'email'      => 'user2@example.com',
                'password'   => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'user3',
                'email'      => 'user3@example.com',
                'password'   => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('userlogin')->insert($users);
    }
}