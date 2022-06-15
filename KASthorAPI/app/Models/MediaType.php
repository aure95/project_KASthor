<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class MediaType extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Mediatypes';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'name';

    protected $fillable = ['name'];

    use HasFactory;
}
