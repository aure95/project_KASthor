<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Mediatype;

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
    protected $fillable = ['creator',
                           'provider',
                           'summary',
                           'links',
                           'release_date'
                         ];

    public function type() {
        return $this->belongsTo(MediaType::class, 'mediatypetype_id');
    }

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
