<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,

            'description' => $this->description,

            'address' => $this->address,

            'latitude' => $this->latitude,
            'longitude' => $this->longitude,

            'whatsapp' => $this->whatsapp,
            'phone' => $this->phone,

            'logo' => $this->logo,
            'cover_image' => $this->cover_image,

            'delivery_available' => $this->delivery_available,
            'pickup_available' => $this->pickup_available,

            'opening_time' => $this->opening_time,
            'closing_time' => $this->closing_time,

            'featured' => $this->featured,

            'views_count' => $this->views_count,

            'category' => $this->category,

            'location' => $this->location,

            'products' => $this->products,

            'distance' => round($this->distance ?? 0, 2),
        ];
    }
}