<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Date;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';

    public $incrementing = true;

    public $timestamps = false;

    protected $primaryKey = '_id';

    protected $fillable = ['name'];

    use HasFactory;
}
