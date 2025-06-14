<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request): array{
        return [
            'id' => $this->id,
            'name' => $this->name,
            'expiry_date' => $this->expiry_date,
            'description' => $this->description,
            'category_id' => $this->category?->id,
            'created_at' => $this->created_at,
        ];
    }
}
