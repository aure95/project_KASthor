<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Date;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Categories';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'name';

    use HasFactory;
}
