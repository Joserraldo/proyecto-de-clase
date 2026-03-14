<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // We assume authentication is handled by middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|max:2048', // 2MB limit
            'categoria' => 'required|exists:categories,id',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nombre' => 'nombre del producto',
            'precio' => 'precio',
            'descripcion' => 'descripción',
            'imagen' => 'imagen',
            'categoria' => 'categoría',
        ];
    }
}
