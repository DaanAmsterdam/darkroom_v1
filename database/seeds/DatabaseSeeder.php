<?php

use Illuminate\Database\Seeder;

// php artisan migrate:refresh --seed
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
            UsersTableSeeder::class,
            PhotosTableSeeder::class,
        ]);
    }
}
