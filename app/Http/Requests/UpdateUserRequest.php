<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|alpha:ascii|max:75|min:1',
            'email' => 'required|email:rfc,dns|max:50|min:2',
            'username' => 'required|max:50|min:2',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.alpha' => 'Nama hanya boleh menggunakan huruf',
            'name.max' => 'Panjang nama maksimal 75 huruf',
            'name.min' => 'Panjang nama minimal 1 huruf',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Panjang email maksimal 50 karakter',
            'email.min' => 'Panjang email minimal 2 karakter',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Panjang username maksimal 50 karakter',
            'username.min' => 'Panjang username minimal 2 karakter',
        ];
    }
}
