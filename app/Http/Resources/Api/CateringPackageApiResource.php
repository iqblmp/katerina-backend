<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CateringPackageApiResource extends JsonResource
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
            'slug' => $this->slug,
            'is_popular' => $this->is_popular,
            'thumbnail' => $this->thumbnail,
            'about' => $this->about,

            'city' => new CityApiResource($this->whenLoaded('city')),
            'categoty' => new CategoryApiResource($this->whenLoaded('category')),
            'kitchen' => new KitchenApiResource($this->whenLoaded('kitchen')),

            'photos' => CateringPhotoApiResource::collection($this->whenLoaded('photos')),
            'bonuses' => CateringBonusApiResource::collection($this->whenLoaded('bonuses')),
            'testimonials' => CateringTestimonialApiResource::collection($this->whenLoaded('testimonials')),
            'tiers' => CateringTierApiResource::collection($this->whenLoaded('tiers')),
        ];
    }
}
