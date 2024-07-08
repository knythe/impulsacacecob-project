<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEstudiantesRequest extends FormRequest
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
            'apoderado_id' => 'required|exists:apoderados,id',
            'nombres' => 'required|max:80',
            'apellidos'=>'required|max:80',
            'dni' => 'required|max:10|unique:estudiantes,dni',
            'telefono' => 'required|max:15',
            'email'=>'nullable|max:80',
            'sede' => 'required|max:20',
            'direccion' => 'required|max:100',
            'estado' => 'nullable',
            'fecha_registro'=>'nullable'
        ];
    }
}
