<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Date;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Content;

class Tag extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'tags';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name'];


    // public function contents() {
    //     return $this->belongsToMany(Content::class, null, null, 'content_ids');
    // }

    public function contents(){
        return $this->morphToMany(Content::class,'has_content');
    }



    use HasFactory;
}
