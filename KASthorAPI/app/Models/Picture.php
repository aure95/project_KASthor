<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['fileName'];

    use HasFactory;
}
