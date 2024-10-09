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
use Illuminate\Support\Facades\Log;

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
        $data = "There is some problem, Please try again";



        if($pizzaInfo){

            $data =  $this->paymentService->buyPizzaByCash($request, $pizzaInfo);

            return redirect()->route('home')->with([
                'success' => 'Your order created successfully',
                'orderInfo' => $data
            ]);

        } else {
            return redirect()->route('home')->with(['error'=>$data]);
        }









    }

}
