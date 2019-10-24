<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'type' => 'countries',
            'id' => $this->id,
            'attributes' => [

                'sortname' => $this->sortname,
                'name' => $this->name,
                'phonecode' => $this->phonecode,
                
            ],

        ];
    }
}
