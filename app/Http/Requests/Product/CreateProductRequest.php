<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'image' => 'sometimes|image',
            'price' => 'required',
            'slug' => ''
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => __('message.name_required'),
            'description.required' => __('message.description_required'),
            'image.image' => __('message.image_invalid'),
            'price.required' => __('message.price_required'),
        ];
    }
}
