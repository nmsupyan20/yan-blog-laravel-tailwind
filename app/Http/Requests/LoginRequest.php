<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|max:50|min:2',
            'password' => 'required|max:16|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Panjang username maksimal 50 karakter',
            'username.min' => 'Panjang username minimal 2 karakter',
            'password.required' => 'Password wajib diisi',
            'password.max' => 'Panjang password maksimal 16 karakter',
            'password.min' => 'Panjang password minimal 6 karakter'
        ];
    }
}
