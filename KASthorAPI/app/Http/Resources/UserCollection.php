<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Jsonresource;

class UserCollection extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'preference' => $this->preferences,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_date' => $this->deleted_date
        ];
    }
}
