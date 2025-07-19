<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'required|min:6|max:15|confirmed:confirmPassword',
            'confirmPassword' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maximal 15 karakter',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'confirmPassword.required' => 'Konfirmasi password wajib diisi'
        ];
    }
}
