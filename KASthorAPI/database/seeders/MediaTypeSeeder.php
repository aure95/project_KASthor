<?php

namespace Database\Seeders;

use App\Models\MediaType;
use Illuminate\Database\Seeder;

class MediaTypeSeeder extends Seeder
{
    private $MEDIA_TYPES = [
        'SERIE',
        'MOVIE',
        'BOOK',
        'MUSIC'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach( $this->MEDIA_TYPES as $mediatype ) {
            MediaType::create(['name' => $mediatype]);
        }

    }
}
