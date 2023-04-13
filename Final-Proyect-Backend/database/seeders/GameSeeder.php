<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(
            [
                [
                    'id' => 1,
                    'name' => "NEED FOR SPEED II: SE",
                    'description' => "Run fast like the wind.",
                    'score' => 8.3,
                    'genre' => "Racing",
                    'publisher' => "Electronic Arts",
                    'release_date' => "1997-10-10",
                ],
                [
                    'id' => 2,
                    'name' => "THE HOUSE OF THE DEAD",
                    'description' => "Keep shooting until you run out of ammo.",
                    'score' => 9.2,
                    'genre' => "Action",
                    'publisher' => "Sega",
                    'release_date' => "1998-01-06",
                ],
                [
                    'id' => 3,
                    'name' => "DUNGEON MASTER",
                    'description' => "Dungeon Master is an epic RPG masterpiece that revolutionizes and rejuvenates the genre.",
                    'score' => 7.1,
                    'genre' => "RPG",
                    'publisher' => "FTL Games",
                    'release_date' => "1992-06-04",
                ],
                [
                    'id' => 4,
                    'name' => "PRINCE OF PERSIA 2: THE SHADOW & THE FLAME",
                    'description' => "It's an action game, set in a platform, middle east and puzzle elements themes",
                    'score' => 6,
                    'genre' => "Action",
                    'publisher' => "Broderbund Software",
                    'release_date' => "1993-05-05",
                ],
                [
                    'id' => 5,
                    'name' => "PAC-MAN",
                    'description' => "Pacman is Pacman",
                    'score' => 10.01,
                    'genre' => "Action",
                    'publisher' => "Atarisoft",
                    'release_date' => "1983-07-19",
                ],
                [
                    'id' => 6,
                    'name' => "THE INCREDIBLE MACHINE 2",
                    'description' => "One can say this series is the precursor to all the puzzle solving video games existing today.",
                    'score' => 4.8,
                    'genre' => "Puzzle",
                    'publisher' => "Sierra On-Line",
                    'release_date' => "1994-04-04",
                ],
                [
                    'id' => 7,
                    'name' => "SARGON II",
                    'description' => "this strategy game is abandonware and is set in a board / party game, chess and turn-based themes.",
                    'score' => 7.8,
                    'genre' => "Strategy",
                    'publisher' => "Green Valley Publishing",
                    'release_date' => "1983-04-02",
                ],              
            ]
        );
    }
}
