<?php

namespace App\Services;

use App\Models\Order;

class PaymentService{
    public function buyPizzaByCash($request, $pizzaInfo){
        $this->createOrder($request, $pizzaInfo)
    }

    public function createOrder($request, $pizzaInfo){
        Order::create()
    }
}