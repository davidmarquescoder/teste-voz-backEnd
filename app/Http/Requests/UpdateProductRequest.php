<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name'        => ['sometimes','string','max:255', Rule::unique('products')->ignore($this->product->id, 'id')],
            'description' => ['sometimes','string','max:255'],
            'price'       => ['sometimes','numeric','min:0'],
            'category_id' => ['sometimes', 'integer', 'exists:categories,id'],
        ];
    }
}
