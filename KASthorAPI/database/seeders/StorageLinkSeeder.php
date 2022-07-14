<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StorageLink;

class StorageLinkSeeder extends Seeder
{
    protected $nbOfStorageLinks = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StorageLink::factory()
            ->count($this->nbOfStorageLinks)
            ->create();
    }
}
