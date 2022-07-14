<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MediaTypeCollection;

class PreferenceCollection extends JsonResource
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
            'universes' => $this->universes,
            'tags' => $this->tags,
            'contents' => $this->contents,
            'categories' => $this->categories,
            'medias' => MediaTypeCollection::collection($this->types)
        ];
    }
}
