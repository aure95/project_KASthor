<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\MediaTypeCollection;

class ContentCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

       return [
         'id' => $this->id,
         'title' => $this->title,
         'creator' => $this->creator,
         'provider' => $this->provider,
         'summary' => $this->summary,
         'medias' => StorageLinkCollection::collection($this->medias),
         'categories' => CategoryCollection::collection($this->categories),
         'links' => $this->links,
         'type' => MediaTypeCollection::collection(array($this->type))[0],
         'release_date' => $this->release_date,
         'created_by' => $this->createdBy,
         'created_at' => $this->created_at,
         'updated_at' => $this->updated_at,
         'deleted_date' => $this->deleted_date
        ];
    }
}
