<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\MediaType;
use App\Models\Category;
use App\Models\StorageLink;
use App\Models\Tag;
use App\Models\Universe;
use Jenssegers\Mongodb\Relations\MorphTo;

class Content extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'contents';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = true;

   /* @var array
     */
    protected $fillable = [
                           'title',
                           'creator',
                           'provider',
                           'summary',
                           'links',
                           'release_date'
                         ];

    public function medias(){
        return $this->morphToMany(StorageLink::class, 'has_storage_links');
    }

    public function type() {
        return $this->belongsTo(MediaType::class, 'mediatype_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, null, null, 'category_ids');
    }

    public function storageLinks() {
        return $this->morphedToMany(StorageLink::class, 'has_content');
    }

    public function createdBy() {
        return $this->belongsToMany(User::class, null, null, 'user_ids');
    }

    public function tags() {
        return $this->morphedByMany(Tag::class, 'has_content');
    }

    public function universes() {
        return $this->morphedByMany(Universe::class, 'has_content');
    }

    protected $casts = [
        'links' => 'array'
    ];

    // public function categories() {
    //     return $this->hasMany(Category::class, 'categories_id');
    // }
    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'creators' => 'array',
    //     'type' => Mediatype::class,
    //     'providers' => 'array',
    //     'pictures' => 'array',
    //     'categories' => 'array',
    //     'links' => 'array',
    //     'releaseDate' => 'array',

    // ];

    use HasFactory;
}
