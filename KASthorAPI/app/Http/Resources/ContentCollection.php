<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        //  'title' => $this->title,
        //  'creator' => $this->creator,
        //  'provider' => $this->provider,
        //  'summary' => $this->summary,
        //  'medias' => $this->medias,
         'categories' => $this->categories(),
        //  'links' => $this->links,
         'type' => $this->type,
        //  'release_date' => $this->release_date,
        //  'created_at' => $this->created_at,
        //  'updated_at' => $this->updated_at,
        //  'deleted_date' => $this->deleted_date
        ];
    }
}
