<?php

namespace Database\Factories;

use App\Models\Advertising;
use App\Models\StorageLink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertising::class;

    protected $nbMaxOfStorageLinks = 2;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'duration' => $this->faker
                            ->dateTime()
                            ->format('Y-m-d H:i:s'),
            'active' => boolval(rand(0,1))
        ];

    }

    public function configure()
    {
        return $this->afterCreating(function (Advertising $advertising) {
            // User
            $randomUser = User::all()->random(1)->first();
            $advertising->customer()->associate($randomUser);
            $advertising->save();

            // StorageLinks
            $storageLinksNumberToGet = rand(1, $this->nbMaxOfStorageLinks);
            $storageLinks = StorageLink::all()->random($storageLinksNumberToGet);
            foreach($storageLinks as $storageLink) {
                $advertising->medias()->attach($storageLink);
            }

        });
    }
}
