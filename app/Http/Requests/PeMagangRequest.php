<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeMagangRequest extends FormRequest
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
			'nim' => 'required|integer',
			'notelp' => 'required|string',
			'nama_instansi' => 'required|string',
			'tgl_mulai_kp' => 'required|string',
			'tgl_selesai_kp' => 'required|string',
			'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ];
    }
}
