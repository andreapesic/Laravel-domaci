<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\UserResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ProviderResource;
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
            'user' => new UserResource($this->resource->userkey),
            'service' => new ServiceResource($this->resource->servicekey),
            'provider' => new ProviderResource($this->resource->providerkey),
            'rating' => $this->resource->rating,
            'note' => $this->resource->note,
        ];
    }
}
