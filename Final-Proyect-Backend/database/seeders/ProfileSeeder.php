<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(
            [
                [
                    'id' => 1,
                    'name' => "Álvaro",
                    'surname' => "Bernabé Alonso",
                    'phone_number' => 666555442,
                    'direction' => "calle falsa n.257",
                    'birth_date' => "1993-10-10",
                    'user_id' => 1,
                ],
                [
                    'id' => 2,
                    'name' => "Laura",
                    'surname' => "Sanchez",
                    'phone_number' => 987654321,
                    'direction' => "calle auténtica n.257",
                    'birth_date' => "1993-03-03",
                    'user_id' => 2,
                ],
                [
                    'id' => 3,
                    'name' => "Alyna",
                    'surname' => "Nastas",
                    'phone_number' => 666666666,
                    'direction' => "calle verdadera n.257",
                    'birth_date' => "1992-02-02",
                    'user_id' => 3,
                ],
                [
                    'id' => 4,
                    'name' => "El Amigo Mario",
                    'surname' => "Buena Gente",
                    'phone_number' => 123456789,
                    'direction' => "calle casi auténtica n.257",
                    'birth_date' => "1991-01-01",
                    'user_id' => 4,
                ]
            ]
        );
    }
}
