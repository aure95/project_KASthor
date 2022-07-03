<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\MediaType;
use App\Models\Content;
use App\Models\StorageLink;
use App\Models\Universe;
use App\Models\Category;
use App\Models\Advertising;

class Preference extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'preferences';

    protected $primaryKey = '_id';

    public $timestamps = false;

    public function universes() {
        return $this->morphToMany(Universe::class, 'has_universes');
    }

    public function types() {
        return $this->belongsToMany(MediaType::class, null, null, 'mediatype_ids');
    }

    public function contents() {
        return $this->belongsToMany(Content::class, null, null, 'content_ids');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, null, null , 'category_ids');
    }

    public function advertisings(){
        return $this->morphToMany(Advertising::class, 'has_storage_links');
    }

    use HasFactory;
}
