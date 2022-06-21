<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private $CATEGORIES = [
        'Action',
        'Comedy',
        'Thriller',
        'Horror',
        'Fantastic',
        'Anime',
        'Sci-Fi',
        'TV Games'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach( $this->CATEGORIES as $categoryName ) {
            Category::create(['name' => $categoryName]);
        }

    }
}
