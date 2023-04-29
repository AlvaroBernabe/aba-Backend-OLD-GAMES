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
                    'game_image' => "https://pcgames9505.weebly.com/uploads/1/0/2/1/102119388/nfs2secover_1_orig.jpg",
                    'name' => "NEED FOR SPEED II: SE",
                    'description' => "Run fast like the wind.",
                    'score' => 8.3,
                    'genre' => "Racing",
                    'publisher' => "Electronic Arts",
                    'release_date' => "1997-10-10",
                ],
                [
                    'id' => 2,
                    'game_image' => "https://assets-prd.ignimgs.com/2022/05/13/houseofthedead-1652475192188.jpg?width=300&crop=1%3A1%2Csmart&dpr=2",
                    'name' => "THE HOUSE OF THE DEAD",
                    'description' => "Keep shooting until you run out of ammo.",
                    'score' => 9.2,
                    'genre' => "Action",
                    'publisher' => "Sega",
                    'release_date' => "1998-01-06",
                ],
                [
                    'id' => 3,
                    'game_image' => "https://i.3djuegos.com/juegos/8454/dungeon_master/fotos/ficha/dungeon_master-1916276.webp",
                    'name' => "DUNGEON MASTER",
                    'description' => "Dungeon Master is an epic RPG masterpiece that revolutionizes and rejuvenates the genre.",
                    'score' => 7.1,
                    'genre' => "RPG",
                    'publisher' => "FTL Games",
                    'release_date' => "1992-06-04",
                ],
                [
                    'id' => 4,
                    'game_image' => "https://cdn.wikimg.net/en/strategywiki/images/b/b1/PoP2_cover.jpg",
                    'name' => "PRINCE OF PERSIA 2: THE SHADOW & THE FLAME",
                    'description' => "It's an action game, set in a platform, middle east and puzzle elements themes",
                    'score' => 6,
                    'genre' => "Action",
                    'publisher' => "Broderbund Software",
                    'release_date' => "1993-05-05",
                ],
                [
                    'id' => 5,
                    'game_image' => "https://assets-prd.ignimgs.com/2022/04/16/pacman-1650079973919.jpg?width=300&crop=1%3A1%2Csmart&dpr=2",
                    'name' => "PAC-MAN",
                    'description' => "Pacman is Pacman",
                    'score' => 10.01,
                    'genre' => "Action",
                    'publisher' => "Atarisoft",
                    'release_date' => "1983-07-19",
                ],
                [
                    'id' => 6,
                    'game_image' => "https://assets-prd.ignimgs.com/2022/12/22/incrediblemachine-1671734851893.jpg?width=300&crop=1%3A1%2Csmart&dpr=2",
                    'name' => "THE INCREDIBLE MACHINE",
                    'description' => "One can say this series is the precursor to all the puzzle solving video games existing today.",
                    'score' => 4.8,
                    'genre' => "Puzzle",
                    'publisher' => "Sierra On-Line",
                    'release_date' => "1994-04-04",
                ],
                [
                    'id' => 7,
                    'game_image' => "https://www.belgianchesshistory.be/wp-content/uploads/2018/02/Sargon-II.jpg",
                    'name' => "SARGON II",
                    'description' => "this strategy game is abandonware and is set in a board / party game, chess and turn-based themes.",
                    'score' => 7.8,
                    'genre' => "Strategy",
                    'publisher' => "Green Valley Publishing",
                    'release_date' => "1983-04-02",
                ],         
                [
                    'id' => 8,
                    'game_image' => "https://pcgames9505.weebly.com/uploads/1/0/2/1/102119388/nfs2secover_1_orig.jpg",
                    'name' => "NEED FOR SPEED II2: SE",
                    'description' => "Run fast like the wind.",
                    'score' => 8.3,
                    'genre' => "Racing",
                    'publisher' => "Electronic Arts",
                    'release_date' => "1997-10-10",
                ],       
            ]
        );
    }
}
