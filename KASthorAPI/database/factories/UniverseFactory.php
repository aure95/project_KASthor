<?php

namespace Database\Factories;

use App\Models\Universe;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Content;

class UniverseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Universe::class;

    protected $nbMaxOfContents = 10;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contentNumberToGet = rand(1, $this->nbMaxOfContents);
        $contents = Content::all()->random($contentNumberToGet);

        $universe = new Universe();
        $universe->name =  $this->faker->title();
        $universe->contents()->attach($contents[0]);

        return $universe;
    }
}
