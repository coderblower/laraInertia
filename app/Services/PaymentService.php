<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\Http\Resources\TransactionResource;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Str;

class PaymentService{
    public function buyPizzaByCash($request, $pizzaInfo){
        ///create Order and save it into variable ;
       $order =  $this->createOrder($request, $pizzaInfo);


        // then create Transiction using order variable;
       $transaction = Transaction::create([
        'payment_type' => $order->payment_type,
        'order_id' => $order->id,
        'user_serial' => $order->user_serial,
        'stripe_session_id' => null,
        'status' => "paid",
       ]);



        // return order and transictoin using array;
        return [
            "orderInfo" => new OrderResource($order) ,
            "transaction" => new TransactionResource($transaction)
        ];

    }

    public function createOrder($request, $pizzaInfo){

        $quantity = $request->quantity ?? 1;


        // dd($request->all());
         return Order::create([
            'size' => $request->size,
            'crust' => $request->crust,
            'toppings' => $request->toppings, // Convert array to JSON
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'quantity' => $request->quantity,
            'status' => "Ordered",
            'user_serial' => Str::uuid(),
            'pizza_id' => $pizzaInfo->id,
            'payment_type' => $request->payment_type,
            'pizza_name' => $pizzaInfo->name,
            'pizza_price' => $pizzaInfo->price,
            'total_price' => ($pizzaInfo->total_price * $quantity) + 10 ,
        ]);
    }
}
