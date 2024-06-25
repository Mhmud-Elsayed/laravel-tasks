<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "id" => $this->id,
            "name" => $this->name,
            "totalamount" => $this->totalamount,
            "comments" => $this->comments,
            // "user_id" => $this->user_id,
            // "created_at" => $this->created_at,
            // "updated_at" => $this->updated_at,
        //     "products" => ProductResource::collection($this->products),
        //     "user" => UserResource::collection($this->user),
        ];
    }
}
