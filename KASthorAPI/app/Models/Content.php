<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\MediaType;
use App\Models\Category;
use App\Models\StorageLink;

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

    public function type() {
        return $this->belongsTo(MediaType::class, 'mediatype_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, null, null, 'category_ids');
    }

    public function medias() {
        return $this->belongsToMany(StorageLink::class, null, null, 'storagelink_ids');
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $casts = [
        'links' => 'array'
    ];

    use HasFactory;
}
