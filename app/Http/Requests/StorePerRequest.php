<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nrp' => ['required'],
            'nama' => ['required'],
            'tmp_lahir' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required'],
            'title_id' => ['required'],
            'status_id' => ['required'],
            'organization_id' => ['required'],
            'foto' => ['nullable', 'image'],
        ];
    }
}
