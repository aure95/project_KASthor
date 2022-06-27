<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use App\Models\StorageLink;

class Advertising extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'advertising';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name, active'];

    public function duration(Date $date) {
        return $date;
    }

    public function medias(){
        return $this->morphToMany(StorageLink::class, 'has_storage_links');
    }

      /**
     * The attributes that should be cast.
     *
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    use HasFactory;
}
