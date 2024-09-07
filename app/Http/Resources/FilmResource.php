<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'judul' => $this -> judul,
            'sinopsis' => $this -> sinopsis,
            'tanggal_publish' => $this -> tanggal_publish,
            'sutradara' => $this -> sutradara,
            'studio' => $this -> studio,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,

            'Genre' => new GenreResource($this->whenLoaded('genre'))
        ];
    }
}
