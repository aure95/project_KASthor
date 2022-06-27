<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Content;
use App\Models\Advertising;

class StorageLink extends Model
{
    protected $connection = 'mongodb';
    protected $collection='storage_links';

    protected $primaryKey = '_id';

    /* @var bool
    */
    public $timestamps = false;

   /* @var array
     */
    protected $fillable = ['name'];

    public function content_owners() {
        return $this->morphedBymany(Content::class, 'has_storage_links');
    }

    public function a0dvertising_owners() {
        return $this->morphedBymany(Advertising::class, 'has_storage_links');
    }

    use HasFactory;
}
