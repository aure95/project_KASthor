<?php

namespace Database\Seeders;

use App\Models\StorageLink;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MediaTypeSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ContentSeeder;
use Database\Seeders\UniverseSeeder;
use Database\Seeders\StorageLinkSeeder;
use Database\Seeders\AdvertisingSeeder;

class DatabaseSeeder extends Seeder
{
    private $seedersToRun = [
        UserSeeder::class,
        CategorySeeder::class,
        MediaTypeSeeder::class,
        StorageLinkSeeder::class,
        AdvertisingSeeder::class,
        ContentSeeder::class,
        // UniverseSeeder::class
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach( $this->seedersToRun as $seeder) {
           $seederInstance = new $seeder();
           $seederInstance->run();
        }

    }
}
