<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return $this->user()->id == $this->route()->parameter('inventory')->user_id;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'purchase_price' => ['required', 'integer'],
            'resell_price' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
            'currency' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'category_id' => ['nullable', 'integer'],
        ];
    }
}
