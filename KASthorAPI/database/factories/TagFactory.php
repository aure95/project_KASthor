<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Content;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    protected $nbMaxOfContents = 10;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => strtoupper($this->faker->unique()->domainWord())
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Tag $tag) {
            $tag->save();
            $contentNumberToGet = rand(1, $this->nbMaxOfContents);
            $contents = Content::all()->random($contentNumberToGet);
            foreach($contents as $content) {
                $tag->contents()->attach($content);
            }
        });
    }
}
