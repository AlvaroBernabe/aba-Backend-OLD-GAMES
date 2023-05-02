<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 6,
                    'email' => "alvaro101093@gmail.com",
                    'password' => bcrypt("123456"),
                    'role_id' => 1,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 7,
                    'email' => "laura@laura.com",
                    'password' => bcrypt("123456"),
                    'role_id' => 1,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 8,
                    'email' => "alyna@alyna.com",
                    'password' => bcrypt("123456"),
                    'role_id' => 2,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 9,
                    'email' => "elamigomario@gmail.com",
                    'password' => bcrypt("123456"),
                    'role_id' => 2,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
