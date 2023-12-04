<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Film extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'film_id'=>$this->film_id,
        'name'=>$this->name,
        'description'=>$this->description,
        'dateshow'=>$this->dateshow,
        'director'=>$this->director,
        'prodcompany'=>$this->prodcompany,
        'cast'=>$this->cast,
        'photo'=>$this->photo,
        'created_at'=>$this->created_at->format('d/m/y'),
        'updeted_at'=>$this->updeted_at,
    ];
    }
}
