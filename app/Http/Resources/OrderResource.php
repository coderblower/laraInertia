<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Return an array of the order's data
        return [
            'size' => $this->size,
            'crust' => $this->crust,
            'toppings' => $this->toppings, // Decode JSON back to an array
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'user_serial' => $this->user_serial,
            'pizza_id' => $this->pizza_id,
            'payment_type' => $this->payment_type,
            'pizza_name' => $this->pizza_name,
            'pizza_price' => $this->pizza_price,
            'total_price' => $this->total_price,
        ];
    }
}
