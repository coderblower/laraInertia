<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\PizzaResource;
use App\Models\Pizza;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

class PizzaController extends Controller
{

    public function __construct(PaymentService $paymentService){
        $this->paymentService = $paymentService;
    }
    public function index()
    {
        $pizzas = Pizza::latest()->get();
        $convertedPizzaData = PizzaResource::collection($pizzas);

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'pizzas' => $convertedPizzaData,
        ]);
    }


    public function buyPizza(Pizza $pizza){

        return Inertia::render('Pizzas/Buy', [
            'pizza' => $pizza,
        ]);
    }


    public function buyPizzaByCash(OrderRequest $request){
        $pizzaInfo = Pizza::findOrFail($request->pizzaId);
        if($pizzaInfo){
            $this->paymentService->buyPizzaByCash($request, $pizzaInfo);
        } 

        

    }

}
