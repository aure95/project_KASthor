<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Advertising extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Advertisings';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name'];

    public function duration(Date $date) {
        return $date;
    }

    public function media() {

    }


    use HasFactory;
}
