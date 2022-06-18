<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MediaTypeSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    private $seedersToRun = [
        UserSeeder::class,
        CategorySeeder::class,
        MediaTypeSeeder::class
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        foreach( $this->seedersToRun as $seeder) {
           $seederInstance = new $seeder();
           $seederInstance->run();
        }

    }
}
