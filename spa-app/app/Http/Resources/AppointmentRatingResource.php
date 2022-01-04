<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentRatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'appointment_rating';  

    public function toArray($request)
    {
        return [
            'date_and_time' => $this->resource->date_and_time,
            'user' => $this->resource->user,
            'service' => $this->resource->service,
            'provider' => $this->resource->provider,
            'rating' => $this->resource->rating,
            'note' => $this->resource->note,
        ];
    }
}
