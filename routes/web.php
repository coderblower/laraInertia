<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [PizzaController::class, 'index'])->name('home');
Route::get('/buy-pizza/{pizza}', [PizzaController::class, 'buyPizza'])->name('buy_pizza');
Route::post('/buy-pizza/by-cash', [PizzaController::class, 'buyPizzaByCash'])->name('buyPizzaByCash');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/test', [ProfileController::class, 'test'])->name('profile.test');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
