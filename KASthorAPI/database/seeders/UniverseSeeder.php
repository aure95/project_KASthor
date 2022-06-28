<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Universe;
use Database\Factories\UniverseFactory;

class UniverseSeeder extends Seeder
{

    private $nbOfUniverses = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Universe::factory()
            ->count($this->nbOfUniverses)
            ->create();
    }
}
