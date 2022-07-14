<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Content;

class Universe extends Model
{
    protected $connection = 'mongodb';
    protected $collection='universes';

    public $incrementing = true;

    protected $primaryKey = '_id';

    public $timestamps = false;

    protected $fillable = ["name"];

    public function contents(){
        return $this->belongsToMany(Content::class, null, null, 'content_ids');
    }

    use HasFactory;
}
