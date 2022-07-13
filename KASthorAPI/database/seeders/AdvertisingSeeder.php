<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertising;

class AdvertisingSeeder extends Seeder
{
    protected $numberOfAdvertisingToGenerate = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertising::factory()
            ->count($this->numberOfAdvertisingToGenerate)
            ->create();
    }
}
