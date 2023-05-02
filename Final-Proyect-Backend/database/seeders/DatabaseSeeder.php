<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            GameSeeder::class,
        ]);
        \App\Models\User::factory(5)->create();
        \App\Models\Profile::factory(5)->create();
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            NewSeeder::class,
        ]);
        // \App\Models\News::factory(10)->create();
        \App\Models\Review::factory(60)->create();

    }
}
