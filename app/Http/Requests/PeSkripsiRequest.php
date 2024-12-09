<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeSkripsiRequest extends FormRequest
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
			'nama_mahasiswa' => 'required|string',
			'nim' => 'required',
			'judul_sementara' => 'required|string',
			'dosen_pembimbing' => 'required|string',
			'file' => 'required|string',
			'jenis_skripsi' => 'required|string',
        ];
    }
}
