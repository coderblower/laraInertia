<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can add logic to authorize the user here if needed.
        // For now, it returns true, meaning everyone can make this request.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'size' => 'required|string|max:255',
            'crust' => 'required|string|max:255',
            'toppings' => 'array', // Assuming toppings is an array
            'toppings.*' => 'string', // Validate each topping as a string
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pizzaId' => 'required|integer|exists:pizzas,id', // Check if pizzaId exists in pizzas table
            'payment_type' => 'required|in:cash,credit_card,online', // Validate payment method
            'quantity' => 'required|integer|min:1', // Quantity should be at least 1
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|regex:/^[0-9]{10,15}$/', // Validate mobile as a string of digits
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'size.required' => 'Please select a size for your pizza.',
            'crust.required' => 'Please select a crust type.',
            'toppings.array' => 'Toppings should be a valid array.',
            'name.required' => 'Please enter your name.',
            'address.required' => 'Please provide an address.',
            'pizzaId.exists' => 'Selected pizza does not exist.',
            'payment_type.required' => 'Please select a payment method.',
            'quantity.required' => 'Please enter a quantity.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'mobile.required' => 'Please provide a mobile number.',
            'mobile.regex' => 'Mobile number must be between 10 and 15 digits.',
        ];
    }
}
