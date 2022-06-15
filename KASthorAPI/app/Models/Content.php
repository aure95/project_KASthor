<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Mediatype;

class Content extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'ContentsTest';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['title'];

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
