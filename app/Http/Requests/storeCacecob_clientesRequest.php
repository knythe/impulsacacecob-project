<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCacecob_clientesRequest extends FormRequest
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
            'nombres' => 'required|max:50',
            'apellidos'=>'required|max:50',
            'telefono' => 'required|max:15',
            'email' => 'nullable|max:80',
            'documento_identidad'=>'required|max:11|unique:cacecob_clientes,documento_identidad',
            'nacionalidad'=>'required|max:200',
            'direccion'=>'required|max:200',
            'estado' => 'nullable',
            'fecha-registro'=>'nullable'
        ];
    }
}
