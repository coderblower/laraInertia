<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
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
            'image' => $this->image,
            'size' => $this->size, // Decode JSON to array
            'crust' => $this->crust, // Decode JSON to array
            'toppings' => $this->toppings, // Decode JSON to array
            'price' => $this->price,

        ];
    }
}
