<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|max:50|min:5',
            'image' => 'nullable|file|image|max:2050|extensions:jpg,png,jpeg|mimetypes:image/jpg,image/png,image/jpeg',
            'category_id' => 'required',
            'content' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib untuk diisi',
            'title.max' => 'Panjang judul maksimal 50 karakter',
            'title.min' => 'Panjang judul minimal 5 karakter',
            'image.file' => 'Kolom gambar harus berupa file.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'image.extensions' => 'Format gambar yang diizinkan hanya JPG, PNG, atau JPEG.',
            'image.mimetypes' => 'Tipe file gambar tidak valid. Pastikan formatnya JPG, PNG, atau JPEG.',
            'category_id.required' => 'Kategori wajib dipilih',
            'content.required' => 'Konten dari postingan wajib untuk diisi'
        ];
    }
}
