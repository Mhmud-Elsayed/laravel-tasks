<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            // "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "quantity" => $this->quantity,
            // "order_id" => $this->order_id,
            // "created_at" => $this->created_at,
            // "updated_at" => $this->updated_at,
            "product" => new ProductResource($this->product),
            "order" => new OrderResource($this->order)
        ];
    }
}
