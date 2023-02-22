<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
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
          'id'          => $this->id,
          'name'        => $this->name,
          'address'     => $this->address,
          'locale'      => $this->locale,
          'latitude'    => $this->latitude,
          'longitude'   => $this->longitude,
          'limit'       => $this->limit,
          'rates'       => $this->rates,
          'locale_name' => $this->locale_name,
          'images'      => $this->images,
          'reviews'     => $this->reviews,
        ];
    }
}
