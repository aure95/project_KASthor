<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class StorageLink extends Model
{
    protected $connection = 'mongodb';
    // protected $collection = 'storage_links';
    protected $collection='storage_links';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name'];

    use HasFactory;
}
