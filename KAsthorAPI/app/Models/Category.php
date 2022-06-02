<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Categories';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name'];

    use HasFactory;
}
