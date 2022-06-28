<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content;

class Universe extends Model
{
    protected $connection = 'mongodb';
    protected $collection='universes';

    protected $primaryKey = '_id';

    public $timestamps = false;

    protected $fillable = ["name"];

    // public function contents() {
    //     return $this->belongsToMany(Content::class, null, null, 'content_ids');
    // }

    public function contents(){
        return $this->morphToMany(Content::class, 'has_content');
    }

    use HasFactory;
}
