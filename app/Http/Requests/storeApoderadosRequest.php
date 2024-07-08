<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeApoderadosRequest extends FormRequest
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
            
            'nombres' => 'required|max:50|unique:apoderados,nombres',
            'apellidos'=>'required|max:50',
            'parentesco' => 'required|max:30',
            'telefono' => 'required|max:15',
            'telefono_secundario' => 'nullable|max:15',
            'email' => 'nullable|max:100',
            'fecha-registro'=>'nullable',
            'estado' => 'nullable'
        ];
    }
}
