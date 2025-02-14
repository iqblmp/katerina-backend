<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CateringSubscriptionApiResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'post_code' => $this->post_code,
            'city' => $this->city,
            'address' => $this->address,
            'notes' => $this->notes,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'booking_trx-id' => $this->booking_trx_id,
            'price' => $this->price,
            'total_tax_amount' => $this->total_tax_amount,
            'total_amount' => $this->total_amount,
            'delivery_time' => $this->delivery_time,
            'quantity' => $this->quantity,
            'duration' => $this->duration,
            'isPaid' => $this->is_paid,
            'proof' => $this->proof,

            'cateringPackage' => new CateringPackageApiResource($this->whenLoaded('cateringPackage')),
            'cateringTier' => new CateringTierApiResource($this->whenLoaded('cateringTier')),
        ];
    }
}
