<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\MediaType;
use App\Models\Content;

class Preference extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'preferences';

    protected $primaryKey = '_id';

    public $timestamps = false;

    public function types() {
        return $this->belongsToMany(MediaType::class, null, null, 'mediatype_ids');
    }

    public function contents() {
        return $this->belongsToMany(Content::class, null, null, 'content_ids');
    }
    //doesn t work properly
    // public function contents() {
    //     return $this->morphToMany(Content::class, null, null,'has_content_id');
    // }

    public function categories() {
        return $this->belongsToMany(Category::class, null, null , 'category_ids');
    }

    use HasFactory;
}
