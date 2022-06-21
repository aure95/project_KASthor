<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tmdb\Repository\MovieRepository;
use Tmdb\Client as Client;



class ContentFactory extends Factory
{
    // protected $client;

    // public function __construct() {
    //     // $this->$client = new Client();
    //     // $repository = new MovieRepository($client);
    //     // $movie = $repository->load(1);
    //     // dump($movie);
    // }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;



    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userName = str_replace('.', " ", $this->faker->userName());

        return [
            'title' => $this->faker->name(),
            'creator' => $userName,
            'provider' => $this->faker->company(),
            'summary' => $this->faker->text(),
            'links' => $this->faker->url(),
            'release_date' => $this->faker->dateTime()->format('Y-m-d H:i:s')
        ];
    }
}
