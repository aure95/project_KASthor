<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use App\Models\StorageLink;
use App\Models\User;

class Advertising extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'advertising';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = true;

   /* @var array
     */
    protected $fillable = ['name, active, duration'];

    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
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
        'duration' => 'date'
    ];

    use HasFactory;
}
