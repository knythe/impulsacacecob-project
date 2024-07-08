<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePagosrequest extends FormRequest
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
            //
            'estudiante_id'=>'required',
            'comprobante_id'=>'required'
        ];
    }
}
