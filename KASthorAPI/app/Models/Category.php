<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Date;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Categories';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = true;

   /* @var array
     */
    protected $fillable = ['value'];

    use HasFactory;
}
