<?php

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
            //CategorySeeder::class,
            //NewsSeeder::class,
            ResourceSeeder::class,
            UserSeeder::class
        ]);
    }
}
