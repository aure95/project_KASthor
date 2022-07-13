<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Content;
use App\Models\MediaType;
use App\Models\StorageLink;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tmdb\Repository\MovieRepository;
use Tmdb\Client as Client;
use Database\Seeders\MediaTypeSeeder;
use App\Models\User;



class ContentFactory extends Factory
{

    static $counter = 1;
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

    protected $nbMaxOfCategories = 3;
    protected $nbMaxOfStorageLinks = 3;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userName = str_replace('.', " ", $this->faker->userName());

        return [
            'title' => $this->faker->unique()->userName(),
            'creator' => $userName,
            'provider' => $this->faker->company(),
            'summary' => $this->faker->text(),
            'links' => $this->faker->url(),
            'release_date' => $this->faker
                         ->dateTime()->format('Y-m-d H:i:s'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Content $content) {
            // Mediatype
            $type = MediaType::all()->random(1)->first();
            $content->type()->associate($type);

            // User
            $user = User::all()->random()->first();
            $content->createdBy()->associate($user);

            $content->save();

            // Categories
            $categoriesNumberToGet = rand(1, $this->nbMaxOfCategories);
            $categories = Category::all()->random($categoriesNumberToGet);
            foreach($categories as $category) {
                $content->categories()->attach($category);
            }
            //StorageLinks
            $storageLinksNumberToGet = rand(1, $this->nbMaxOfStorageLinks);
            $storageLinks = StorageLink::all()->random($storageLinksNumberToGet);
            foreach($storageLinks as $storageLink) {
                $content->medias()->attach($storageLink);
            }
        });
    }
}
