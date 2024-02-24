<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'avatar' => 'sometimes|image',
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
            'name.required' => __('auth.name_required'),
            'username.required' => __('auth.username_required'),
            'username.unique' => __('auth.username_taken'),
            'password.required' => __('auth.password_required'),
            'password.confirmed' => __('auth.password_confirmed'),
            'password.min' => __('auth.password_min'),
            'password.mixed_case' => __('auth.password_mixed_case'),
            'password.numbers' => __('auth.password_numbers'),
            'avatar.image' => __('auth.avatar_image'),
        ];
    }
}