<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class StorageLink extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Storagelinks';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name'];

    public function mediatype() {
        return $this->hasOne(MediaType::class,  '_id', 'mediatype_id');
    }

    use HasFactory;
}
