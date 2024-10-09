<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'payment_type' => $this->payment_type,
            'order_id' => $this->order_id,
            'user_serial' => $this->user_serial,
            'stripe_session_id' => $this->stripe_session_id,
            'status' => $this->status,
        ];
    }
}

