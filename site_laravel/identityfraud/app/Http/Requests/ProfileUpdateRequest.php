<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', 'max:255'],
            'password'         => ['nullable', 'string', 'min:8', 'confirmed'],
            'profile_picture'  => ['nullable', 'image', 'max:2048'],
            'remove_picture'   => ['nullable', 'in:0,1'], // ✅ adiciona esta linha
        ];
    }
}
