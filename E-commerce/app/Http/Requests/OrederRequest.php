<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrederRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:256|string",
            "totalamount" => "required|numeric",
            "comments" => "required|string",
            "user_id" => "required|numeric",
            
            'product_id'=>"required|numeric",
            'quantity'=>"required|numeric",
            'price'=>"required|numeric",
            
        ];
    }
}
