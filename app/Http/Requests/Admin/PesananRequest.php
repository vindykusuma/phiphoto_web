<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PesananRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
        return [

            'pricelist_id' => 'required',
            'fotografer_id' => 'nullable',
            'time_from' => 'required|date_format:Y-m-d H:i',
            'catatan_tambahan' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ];
}

case 'PUT':
case 'PATCH':
{
    return [
        'catatan_tambahan' => 'required',
        'pricelist_id' => 'required',
        'fotografer_id' => 'required',
        'status' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'time_from' => ['required','date_format:Y-m-d H:i'],

    ];
}
default: break;
}
}
}
