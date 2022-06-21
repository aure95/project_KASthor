<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Content;

class MediaType extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'mediatypes';

    public $incrementing = true;

    public $timestamps = false;

    protected $primaryKey = '_id';

    protected $fillable = ['name'];

    public function contents(){
        return $this->morphToMany(Content::class,'has_content');
    }

    use HasFactory;
}
