<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
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

            'type' => "movies",
            'id' => $this->id,
            'attributes' => [

                'title' => $this->title,
                'release_year' => $this->release_year,
                'rated' => $this->rated,
                'release_date' => $this->release_date,
                'runtime' => $this->runtime,
                'director' => $this->director,
                'actors' => $this->actors
            ]
        ];


    }
}
